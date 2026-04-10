<?php

namespace FFramework\View;

use FFramework\Core\Kernel;

class View
{
    private string $viewPath;
    private string $cachePath;
    private array  $data = [];

    public function __construct()
    {
        $this->viewPath  = Kernel::$config->get('view.path');
        $this->cachePath = Kernel::$config->get('view.cache');

        if (!$this->viewPath) {
            throw new \RuntimeException('view.path config tanımlı değil.');
        }
    }

    // ─── Static facade ───────────────────────────────────────

    public static function render(string $view, array $data = []): void
    {
        (new static())->make($view, $data);
    }

    // ─── Core ────────────────────────────────────────────────

    public function make(string $view, array $data = []): void
    {
        $this->data = $data;

        // 'users.index' → 'users/index.ff.php'
        $viewFile = $this->viewPath . '/' . str_replace('.', '/', $view) . '.ff.php';

        if (!file_exists($viewFile)) {
            throw new \RuntimeException("View bulunamadı: $viewFile");
        }

        $compiled = $this->compile($viewFile);

        // Data'yı extract et, view içinde $name, $users gibi kullanılabilsin
        extract($this->data, EXTR_SKIP);

        include $compiled;
    }

    // ─── Compiler ────────────────────────────────────────────

    private function compile(string $viewFile): string
    {
        // Cache yoksa veya view daha yeniyse yeniden derle
        $cacheFile = $this->cachePath . '/' . md5($viewFile) . '.php';

        if (!is_dir($this->cachePath)) {
            mkdir($this->cachePath, 0755, true);
        }

        if (!file_exists($cacheFile) || filemtime($viewFile) > filemtime($cacheFile)) {
            $content  = file_get_contents($viewFile);
            $compiled = $this->compileDirectives($content);
            file_put_contents($cacheFile, $compiled);
        }

        return $cacheFile;
    }

    private function compileDirectives(string $content): string
    {
        // Echo
        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars($1, ENT_QUOTES, \'UTF-8\') ?>', $content);

        // Raw echo (XSS koruması yok)
        $content = preg_replace('/\{!!\s*(.+?)\s*!!\}/', '<?= $1 ?>', $content);

        // @if
        $content = preg_replace('/@if\s*\((.+?)\)/', '<?php if ($1): ?>', $content);
        $content = preg_replace('/@elseif\s*\((.+?)\)/', '<?php elseif ($1): ?>', $content);
        $content = str_replace('@else', '<?php else: ?>', $content);
        $content = str_replace('@endif', '<?php endif; ?>', $content);

        // @foreach
        $content = preg_replace('/@foreach\s*\((.+?)\)/', '<?php foreach ($1): ?>', $content);
        $content = str_replace('@endforeach', '<?php endforeach; ?>', $content);

        // @for
        $content = preg_replace('/@for\s*\((.+?)\)/', '<?php for ($1): ?>', $content);
        $content = str_replace('@endfor', '<?php endfor; ?>', $content);

        // @while
        $content = preg_replace('/@while\s*\((.+?)\)/', '<?php while ($1): ?>', $content);
        $content = str_replace('@endwhile', '<?php endwhile; ?>', $content);

        // @php / @endphp
        $content = str_replace('@php', '<?php', $content);
        $content = str_replace('@endphp', '?>', $content);

        // @include
        $content = preg_replace_callback(
            '/@include\s*\([\'"](.+?)[\'"]\)/',
            fn($m) => "<?php \\FFramework\\View\\View::render('{$m[1]}', get_defined_vars()); ?>",
            $content
        );

        return $content;
    }
}
