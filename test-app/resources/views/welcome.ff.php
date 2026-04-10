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

    <div class="pointer-events-none fixed inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -left-1/4 top-0 h-[520px] w-[520px] rounded-full bg-red-600/20 blur-[120px]"></div>
        <div class="absolute -right-1/4 bottom-0 h-[480px] w-[480px] rounded-full bg-red-900/25 blur-[100px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,rgba(220,38,38,0.15),transparent)]"></div>
    </div>

    <main class="relative z-10">
        <div class="mx-auto flex min-h-screen max-w-5xl flex-col justify-center px-4 py-16 sm:px-6 lg:px-8">
            <header class="mb-12 text-center sm:mb-14">
                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-red-500/25 bg-zinc-900/60 px-3 py-1 text-xs font-medium text-red-300/90 shadow-depth-sm backdrop-blur-md">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500 shadow-[0_0_12px_rgba(239,68,68,0.9)]" aria-hidden="true"></span>
                    PHP 8.1+ · lightweight core
                </div>
                <h1 class="ffonts-exo2 text-balance text-3xl font-semibold tracking-tight text-white sm:text-4xl md:text-5xl">
                    FFramework
                </h1>
                <p class="mx-auto mt-4 max-w-xl text-pretty text-sm leading-relaxed text-zinc-400 sm:text-base">
                    Clear routing, views, and room to grow — a calm, productive foundation for PHP apps.
                </p>
            </header>

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
                        Although there was an htaccess file in the past, route flow was brittle. Now it works with a minimal .htaccess — predictable storage and routing.
                    </p>
                </article>

                <article class="group relative overflow-hidden rounded-2xl border border-zinc-800/80 bg-zinc-900/40 p-5 shadow-depth-md backdrop-blur-sm transition duration-200 ease-out hover:border-red-500/30 hover:shadow-depth-lg hover:shadow-glow-red sm:p-6">
                    <div class="absolute right-4 top-4 h-16 w-16 rounded-full bg-red-500/10 blur-2xl transition group-hover:bg-red-500/20" aria-hidden="true"></div>
                    <h2 class="ffonts-nunito relative text-lg font-semibold text-white">Route Management</h2>
                    <p class="relative mt-3 text-sm leading-relaxed text-zinc-400">
                        Route logic was corrected and improved. Readable groups and parameters — more useful features keep landing in this version.
                    </p>
                </article>

                <article class="group relative overflow-hidden rounded-2xl border border-zinc-800/80 bg-zinc-900/40 p-5 shadow-depth-md backdrop-blur-sm transition duration-200 ease-out hover:border-red-500/30 hover:shadow-depth-lg hover:shadow-glow-red sm:p-6">
                    <div class="absolute right-4 top-4 h-16 w-16 rounded-full bg-red-500/10 blur-2xl transition group-hover:bg-red-500/20" aria-hidden="true"></div>
                    <h2 class="ffonts-nunito relative text-lg font-semibold text-white">REST API SDK</h2>
                    <p class="relative mt-3 text-sm leading-relaxed text-zinc-400">
                        REST API SDK from the same author will ship in a future update. Browse the project on
                        <a href="https://github.com/hasirciogli/php-rest-api" target="_blank" rel="noopener noreferrer" class="font-medium text-red-400 underline decoration-red-500/40 underline-offset-2 transition hover:text-red-300">GitHub</a>.
                    </p>
                </article>
            </div>
        </div>

        <footer id="footer-side" class="relative z-10 border-t border-zinc-800/80 bg-zinc-950/80 backdrop-blur-md">
            <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-10 md:flex-row md:justify-between">
                    <div>
                        <a href="<?php echo Kernel::$config->get('site.ssl') . '://' . Kernel::$config->get('site.domain'); ?>"
                            class="inline-flex items-center gap-2 text-xl font-semibold tracking-tight text-white transition hover:text-red-400">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-600/20 text-sm font-bold text-red-400 shadow-depth-sm">F</span>
                            FFramework
                        </a>
                        <p class="mt-3 max-w-xs text-sm text-zinc-500">
                            A minimal, fast, extensible starting point for modern PHP.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-8 sm:grid-cols-4 sm:gap-10">
                        <div>
                            <h2 class="mb-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Document</h2>
                            <ul class="space-y-3 text-sm text-zinc-400">
                                <li><a href="#" class="transition hover:text-red-400">API Documentations</a></li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Contact</h2>
                            <ul class="space-y-3 text-sm text-zinc-400">
                                <li><a href="mailto:mhasirciogli@gmail.com" class="transition hover:text-red-400">mhasirciogli@gmail.com</a></li>
                                <li><a href="#" class="transition hover:text-red-400">+90 555 890 98 99</a></li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Follow</h2>
                            <ul class="space-y-3 text-sm text-zinc-400">
                                <li><a href="https://instagram.com/m.hasirciogli" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Instagram</a></li>
                                <li><a href="https://www.facebook.com/hasirciogli" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Facebook</a></li>
                                <li><a href="https://twitter.com/hasirciogli" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Twitter</a></li>
                                <li><a href="https://discord.gg/y38CZgHMMq" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Discord — Noxy#1881</a></li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-4 text-xs font-semibold uppercase tracking-wider text-zinc-500">Legal</h2>
                            <ul class="space-y-3 text-sm text-zinc-400">
                                <li><a href="/policy?page=privacy" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Privacy Policy</a></li>
                                <li><a href="/policy?page=use" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Terms &amp; Conditions</a></li>
                                <li><a href="/policy?page=cookie" target="_blank" rel="noopener noreferrer" class="transition hover:text-red-400">Cookie Agreement</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="my-10 border-zinc-800/80">

                <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                    <p class="text-center text-sm text-zinc-500 sm:text-left">
                        © <?php echo date('Y'); ?>
                        <a href="#" class="text-zinc-400 transition hover:text-red-400">FFramework™</a>. All rights reserved.
                    </p>
                    <div class="flex flex-wrap items-center justify-center gap-5">
                        <a href="https://facebook.com/hsrcpay" target="_blank" rel="noopener noreferrer" class="text-zinc-500 transition hover:text-red-400" aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="https://instagram.com/hsrcpay" target="_blank" rel="noopener noreferrer" class="text-zinc-500 transition hover:text-red-400" aria-label="Instagram">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="https://twitter.com/hsrcpay" target="_blank" rel="noopener noreferrer" class="text-zinc-500 transition hover:text-red-400" aria-label="Twitter">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="https://github.com/hsrcpay" target="_blank" rel="noopener noreferrer" class="text-zinc-500 transition hover:text-red-400" aria-label="GitHub">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="/" class="text-zinc-500 transition hover:text-red-400" aria-label="Site">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>