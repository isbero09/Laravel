# Script para instalar extensiones de VS Code en Windows

$extensions = @(
    "DEVSENSE.composer-php-vscode",              # Composer DEVSENSE :contentReference[oaicite:1]{index=1}
    "DEVSENSE.profiler-php-vscode",              # Profiler DEVSENSE :contentReference[oaicite:2]{index=2}
    "DEVSENSE.phptools-vscode",                  # PHP Tools DEVSENSE :contentReference[oaicite:3]{index=3}
    "bmewburn.vscode-intelephense-client",       # Intelephense :contentReference[oaicite:4]{index=4}
    "DEVSENSE.intelli-php-vscode",               # IntelliPHP :contentReference[oaicite:5]{index=5}
    "xdebug.php-debug",                          # PHP Debug Xdebug :contentReference[oaicite:6]{index=6}
    "xdebug.php-pack",                           # PHP Extension Pack Xdebug
    "zobo.php-intellisense",                     # PHP IntelliSense Damjan Cvetko :contentReference[oaicite:7]{index=7}
    "bradlc.vscode-tailwindcss",                 # Tailwind CSS IntelliSense :contentReference[oaicite:8]{index=8}
    "stivo.tailwind-fold",                       # Tailwind Fold :contentReference[oaicite:9]{index=9}
    "florian-klampfer.sqlite-viewer",            # SQLite Viewer :contentReference[oaicite:10]{index=10}
    "amir9480.laravel-extra-intellisense",       # Laravel Extra Intellisense
    "codingyu.laravel-goto-view",                # Laravel goto view
    "onecentlin.laravel-blade",                  # Laravel Blade Snippets :contentReference[oaicite:11]{index=11}
    "shufo.vscode-blade-formatter",              # Blade Formatter :contentReference[oaicite:12]{index=12}
    "IHunte.laravel-blade-wrapper"               # Laravel Blade Wrapper :contentReference[oaicite:13]{index=13}
)

if (Get-Command "code" -ErrorAction SilentlyContinue) {
    foreach ($ext in $extensions) {
        Write-Host "Instalando: $ext"
        code --install-extension $ext
    }
    Write-Host "✅ Todas las extensiones se instalaron correctamente."
} else {
    Write-Host "❌ No se detectó el comando 'code'. Asegúrate de que VS Code esté instalado y el PATH configurado."
}
