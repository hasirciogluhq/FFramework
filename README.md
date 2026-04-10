<div align="center">

<img src="docs/assets/readme-banner.svg" alt="FFramework — dark zinc, red accent" width="100%" />

<br />

**FFramework** · hafif PHP çatısı · routing · views · genişletilebilir çekirdek

[![PHP](https://img.shields.io/badge/PHP-8.1%2B-DC2626?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Composer](https://img.shields.io/badge/composer-2.x-27272a?style=flat-square&logo=composer&logoColor=white)](composer.json)
[![Packagist](https://img.shields.io/badge/Packagist-hasirciogluhq%2Ffframework-18181b?style=flat-square&logo=packagist&logoColor=white)](https://packagist.org/packages/hasirciogluhq/fframework)
[![License](https://img.shields.io/badge/license-MIT-18181b?style=flat-square)](LICENSE)

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
| **Views**          | Derlenen şablonlar, `test-app/resources/views` altında örnek arayüz |
| **HTTP**           | `Request` üzerinde sorgu, gövde ve route parametreleri              |
| **Veritabanı**     | PDO tabanlı `FFramework\Database\DB` (bkz. `src/database/DB.php`)   |
| **Test altyapısı** | `phpunit/phpunit` (dev bağımlılık)                                  |

---

## Gereksinimler

- PHP **8.1+**
- `ext-pdo` (Composer `require` içinde belirtilir)

---

## Kurulum

### Mevcut projeye paket olarak (önerilen)

[Packagist](https://packagist.org) üzerinde paket adı: **`hasirciogluhq/fframework`**. GitHub organizasyonu / repo adı farklıysa `composer.json` içindeki `name` alanını buna göre güncelle. Depoyu Packagist’e [Submit](https://packagist.org/packages/submit) ile ekledikten sonra:

```bash
composer require hasirciogluhq/fframework
```

Sonra kendi uygulamanızda `vendor/autoload.php` yükleyip `ROOT_PATH` (uygulama kökü), `routes/`, `resources/views`, `storage/cache/views` gibi dizinleri tanımlayın; örnek akış için aşağıdaki `test-app` giriş dosyasına bakın.

### Bu depoyu klonlayarak (geliştirme / örnek uygulama)

```bash
git clone https://github.com/hasirciogluhq/fframework.git
cd fframework
composer install
```

Örnek uygulama: `test-app/public/index.php` → `vendor` üst dizinde (`../vendor/autoload.php`).

Yerel sunucu:

```bash
cd test-app
php -S localhost:8000 -t public public/index.php
```

### Paket doğrulama

```bash
composer validate --strict
```

---

## Üretim hazırlığı (özet değerlendirme)

| Konu | Durum | Not |
|------|--------|-----|
| **Çekirdek HTTP / routing** | Kısmen | İstek yaşam döngüsü çalışır; hata yanıtları JSON içinde dosya/satır dökebilir — prod’da `DEBUG=false` ve özel 500 handler şart. |
| **Hata gösterimi** | Dikkat | `Kernel` prod’da `display_errors` kapalı; yine de yakalanan istisnaların içeriği log’a ayrı yazılmalı, kullanıcıya genel mesaj verilmeli. |
| **Veritabanı (`DB`)** | Riskli | `configs_db_*` sabitleri tanımlı değilse sınıf yüklemesi hata verir; bağlantı hatasında `die()` kullanılıyor. Üretim için env tabanlı yapılandırma ve istisna yönetimi gerekir. |
| **Oturum** | Bilinçli seçim | Her `Request` ile `session_start()` — API-only projelerde kapatılmalı veya lazy olmalı. |
| **Güvenlik başlıkları / CSRF / rate limit** | Yok | Uygulama katmanında veya ters proxy (nginx) ile eklenmeli. |
| **Yayınlama** | Standart | Web kökü yalnızca `public/`; `storage` yazılabilir, kod kökü dışarı açılmamalı. |

**Sonuç:** Kütüphane / iskelet olarak **erken aşama**; üretim öncesi yukarıdaki maddeler netleştirilmeden “tam hazır” sayılmamalı.

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
- **Sosyal:** [Instagram](https://instagram.com/hasirciogluhq) · [Facebook](https://www.facebook.com/hasirciogluhq) · [Twitter/X](https://twitter.com/hasirciogluhq) · [Discord](https://discord.gg/y38CZgHMMq)

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
