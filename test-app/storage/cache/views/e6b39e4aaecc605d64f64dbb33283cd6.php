<?php

use FFramework\Core\Kernel;

?>
<!doctype html>
<html lang="en" class="h-full scroll-smooth">

<head>
    <meta charset="utf-8">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'sans-serif'],
                    },
                    boxShadow: {
                        'depth-sm': '0 2px 8px -2px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.04) inset',
                        'depth-md': '0 12px 40px -12px rgba(0,0,0,0.75), 0 0 0 1px rgba(255,255,255,0.05) inset, 0 1px 0 0 rgba(255,255,255,0.06) inset',
                        'depth-lg': '0 24px 64px -16px rgba(0,0,0,0.85), 0 0 0 1px rgba(220,38,38,0.12), 0 1px 0 0 rgba(255,255,255,0.08) inset',
                        'glow-red': '0 0 80px -20px rgba(220,38,38,0.45)',
                    },
                },
            },
        };
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark">
    <meta name="description" content="FFramework is a PHP framework for building web applications.">
    <meta name="keywords" content="FFramework, PHP, framework, web, application">
    <meta name="author" content="FFramework">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>FFramework V2.6</title>
</head>

<body class="dark min-h-full bg-zinc-950 text-zinc-200 antialiased selection:bg-red-500/40 selection:text-white">

    <!-- Arkaplan Efektleri -->
    <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -left-1/4 top-0 h-[520px] w-[520px] rounded-full bg-red-600/20 blur-[120px]"></div>
        <div class="absolute -right-1/4 bottom-0 h-[480px] w-[480px] rounded-full bg-red-900/25 blur-[100px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,rgba(220,38,38,0.15),transparent)]"></div>
    </div>

    <main class="relative z-10 flex min-h-screen flex-col items-center justify-center">
        <!-- Ana İçerik Konteyneri -->
        <div class="mx-auto max-w-5xl px-4">

            <!-- Üst Başlık (Header) -->
            <header class="mb-12 text-center sm:mb-14">
                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-red-500/25 bg-zinc-900/60 px-3 py-1 text-xs font-medium text-red-300/90 shadow-depth-sm backdrop-blur-md">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500 shadow-[0_0_12px_rgba(239,68,68,0.9)]" aria-hidden="true"></span>
                    PHP 8.1+ · lightweight core
                </div>
                <h1 class="ffonts-exo2 text-balance text-3xl font-semibold tracking-tight text-white sm:text-4xl md:text-5xl">
                    FFramework
                </h1>
                <p class="mx-auto mt-4 max-w-xl text-pretty text-sm leading-relaxed text-zinc-400 sm:text-base">
                    Clear routing, views, and room to grow a calm, productive foundation for PHP apps.
                </p>
            </header>

            <!-- Özellik Kartları -->
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-5">
                <article class="group relative overflow-hidden rounded-2xl border border-zinc-800/80 bg-zinc-900/40 p-5 shadow-depth-md backdrop-blur-sm transition duration-200 ease-out hover:border-red-500/30 hover:shadow-depth-lg hover:shadow-glow-red sm:p-6">
                    <div class="absolute right-4 top-4 h-16 w-16 rounded-full bg-red-500/10 blur-2xl transition group-hover:bg-red-500/20" aria-hidden="true"></div>
                    <h2 class="ffonts-nunito relative text-lg font-semibold text-white">New Implements</h2>
                    <p class="relative mt-3 text-sm leading-relaxed text-zinc-400">
                        Internal cron, mail database and many more features designed to be added soon. An awesome framework where you can make any application you can think of.
                    </p>
                </article>

                <article class="group relative overflow-hidden rounded-2xl border border-zinc-800/80 bg-zinc-900/40 p-5 shadow-depth-md backdrop-blur-sm transition duration-200 ease-out hover:border-red-500/30 hover:shadow-depth-lg hover:shadow-glow-red sm:p-6">
                    <div class="absolute right-4 top-4 h-16 w-16 rounded-full bg-red-500/10 blur-2xl transition group-hover:bg-red-500/20" aria-hidden="true"></div>
                    <h2 class="ffonts-nunito relative text-lg font-semibold text-white">Storage &amp; htaccess</h2>
                    <p class="relative mt-3 text-sm leading-relaxed text-zinc-400">
                        Although there was an htaccess file in the past, route flow was brittle. Now it works with a minimal .htaccess predictable storage and routing.
                    </p>
                </article>

                <article class="group relative overflow-hidden rounded-2xl border border-zinc-800/80 bg-zinc-900/40 p-5 shadow-depth-md backdrop-blur-sm transition duration-200 ease-out hover:border-red-500/30 hover:shadow-depth-lg hover:shadow-glow-red sm:p-6">
                    <div class="absolute right-4 top-4 h-16 w-16 rounded-full bg-red-500/10 blur-2xl transition group-hover:bg-red-500/20" aria-hidden="true"></div>
                    <h2 class="ffonts-nunito relative text-lg font-semibold text-white">Route Management</h2>
                    <p class="relative mt-3 text-sm leading-relaxed text-zinc-400">
                        Route logic was corrected and improved. Readable groups and parameters more useful features keep landing in this version.
                    </p>
                </article>
            </div>

            <!-- Minimal İletişim / Link Alanı -->
            <div class="mt-24 flex flex-col items-center justify-center space-y-6">
                <!-- Sadece en önemli 4 bağlantı yatay dizili -->
                <nav class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4 text-sm font-medium text-zinc-400">

                    <!-- Docs -->
                    <a href="#" class="flex items-center gap-2 transition duration-200 hover:text-red-400">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>
                        Docs
                    </a>

                    <!-- GitHub -->
                    <a href="https://github.com/hasirciogluhq" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 transition duration-200 hover:text-red-400">
                        <svg fill="currentColor" viewBox="0 0 24 24" class="h-4 w-4">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        GitHub
                    </a>

                    <!-- Discord / Community -->
                    <a href="https://discord.gg/hasirciogluhq" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 transition duration-200 hover:text-red-400">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        Community
                    </a>

                    <!-- Email -->
                    <a href="mailto:mhasirciogli@gmail.com" class="flex items-center gap-2 transition duration-200 hover:text-red-400">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        Contact
                    </a>

                </nav>

                <!-- Çok hafif Copyright -->
                <p class="text-xs tracking-wider text-zinc-600">
                    &copy; <?php echo date('Y'); ?> FFramework
                </p>
            </div>

        </div>
    </main>
</body>

</html>