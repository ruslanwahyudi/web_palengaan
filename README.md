--- package list ---
laravel/breeze : for authentication
laravel-lang/lang : for change language default
barryvdh/laravel-debugbar : for debugging in dev mode
nicolaslopezj/searchable : for search table data by query
realrashid/sweet-alert : for alert confirmation (delete)
kennedy-osaze/laravel-api-response : for response API
laravel/sanctum : for token API authentication
laravel spatie Permission: control akses for multiple user 

--- laravel must know ----
1. FormRequest (for validation : rule, preparevalidation)
2. event : for default action (save created in model execute, instead execute it in controller)
3. helper file : for common function that use in many file (App/Helper/myOwnHelper.php) -> register it in composer json, and composer dump--autoload
4. laravel queue jobs : execute code in background, so that user still able to use another feature on the apps.


--- kekurangan ----

--- kekurangan ----


variabel status transaksi 
0 = OPEN
1 = VERIFIED
2 = TERTANDA TANGANI

INSERT INTO `layanan` (`id`, `nama_layanan`, `kode_layanan`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'SKTM', '001', '1', '2024-05-14 12:02:15', '2024-05-14 12:02:15'), (NULL, 'Rekomendasi Nikah', '002', '1', '2024-05-14 12:02:15', '2024-05-14 12:02:15');


INSERT INTO `transaksi_layanan` (`id`, `kode_transaksi`, `kode_layanan`, `layanan_id`, `status_transaksi`, `created_at`, `updated_at`) VALUES ('1', '001', '001', '1', '0', '2024-05-14 11:47:39', '2024-05-14 11:47:39'), ('2', '002', '002', '2', '0', '2024-05-14 11:47:39', '2024-05-14 11:47:39');


INSERT INTO `layanan_sktm` (`id`, `nama_pemohon`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gender`, `kewarganegaraan`, `pekerjaan`, `status_pernikahan`, `keperluan_surat`, `foto_ktp`, `foto_kk`, `transaksi_id`, `created_at`, `updated_at`) VALUES (NULL, 'Samsul Adi', '352804898394830001', 'Pamekasan', '2024-05-01', 'Jl. Pemdua Pamekasan', 'Laki-laki', 'WNI', 'Swasta', 'Menikah', 'Daftar Beasiswa', 'ktp.jpg', 'kk.jpg', '1', '2024-05-14 12:04:51', '2024-05-14 12:04:51');


INSERT INTO `layanan_rekomnikah` (`id`, `nama_pemohon`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gender`, `kewarganegaraan`, `pekerjaan`, `status_pernikahan`, `keperluan_surat`, `nama_pasangan_lama`, `nama_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `kewarganegaraan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `kewarganegaraan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `foto_ktp`, `foto_kk`, `transaksi_id`, `created_at`, `updated_at`) VALUES (NULL, 'Intan Pawiwara', '352803493430001', 'Pamekasan', '2024-05-01', 'Jl. sukma, Pamekasan', 'Perempuan', 'WNI', 'PNS', 'Belum Menikah', 'Pendaftaran Nikah', NULL, 'Suherman', '35299039230230001', 'Pamekasan', '2024-05-01', 'WNI', 'Islam', 'Swasta', 'Suyati', '35299039230230002', 'Pamekasan', '2024-05-02', 'WNI', 'Islam', 'IRT', 'ktp.jpg', 'kk.jpg', '2', '2024-05-14 12:10:23', '2024-05-14 12:10:23');