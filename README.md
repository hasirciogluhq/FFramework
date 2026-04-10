<div align="center">

<img src="docs/assets/readme-banner.svg" alt="FFramework — dark zinc, red accent" width="100%" />

<br />

**FFramework** · hafif PHP çatısı · routing · views · genişletilebilir çekirdek

[![PHP](https://img.shields.io/badge/PHP-8.1%2B-DC2626?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Composer](https://img.shields.io/badge/composer-2.x-27272a?style=flat-square&logo=composer&logoColor=white)](composer.json)

</div>

---

## Özet

FFramework, web uygulamaları için **sade bir PHP iskeleti** sunar: yönlendirme, görünüm katmanı, yapılandırma ve veritabanı gibi parçalar tek bir çizgide tutulur. Amaç; gereksiz süslerden kaçınıp **okunabilir, hızlı** bir başlangıç noktası vermektir.

> Görsel dil: koyu zemin, **kırmızı vurgu**, katmanlı derinlik — depo kökündeki karşılama sayfası (`test-app`) ile aynı çizgi.

---

## Özellikler

| Alan               | Açıklama                                                            |
| ------------------ | ------------------------------------------------------------------- |
| **Routing**        | Grup, parametre, `Request` ile uyumlu handler imzaları              |
| **Views**          | Derlenen şablonlar, `test-app/Resources/Views` altında örnek arayüz |
| **HTTP**           | `Request` üzerinde sorgu, gövde ve route parametreleri              |
| **Veritabanı**     | PDO tabanlı `FFramework\Database\DB` (bkz. `src/database/DB.php`)   |
| **Test altyapısı** | `phpunit/phpunit` (dev bağımlılık)                                  |

---

## Gereksinimler

- PHP **8.1+**
- `ext-pdo` (Composer `require` içinde belirtilir)

---

## Kurulum

```bash
git clone <repo-url> FFramework
cd FFramework
composer install
```

Örnek uygulama için `test-app` içindeki yapıyı referans al: `public/index.php`, `routes/web.php`, yapılandırma dosyaları.

Yerel sunucu (örnek):

```bash
cd test-app
php -S localhost:8000 -t public public/index.php
```

---

## Proje yapısı (özet)

```
src/              # FFramework\ — çekirdek paket
test-app/         # Örnek uygulama ve karşılama sayfası
docs/assets/      # README banner (SVG)
```

---

## Dokümantasyon & iletişim

- **API / doküman:** yakında — şimdilik kaynak kod ve `test-app` örnekleri ana referans.
- **E-posta:** [mhasirciogli@gmail.com](mailto:mhasirciogli@gmail.com)
- **Sosyal:** [Instagram](https://instagram.com/m.hasirciogli) · [Facebook](https://www.facebook.com/hasirciogli) · [Twitter/X](https://twitter.com/hasirciogli) · [Discord](https://discord.gg/y38CZgHMMq)
- **İlgili proje:** [php-rest-api SDK](https://github.com/hasirciogli/php-rest-api) (gelecek sürümlerle uyum hedefi)

---

## Yasal (örnek uygulama route’ları)

Örnek `test-app` içinde tanımlıysa: `/policy?page=privacy` · `/policy?page=use` · `/policy?page=cookie`

---

## Katkı

1. Depoyu fork’la
2. Dal aç (`feat/…` / `fix/…`)
3. Değişiklikleri gönder (pull request)

---

<div align="center">

**FFramework™** · © benzeri tüm haklar saklıdır

</div>
