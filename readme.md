<div align="center">
    <img src=".ignoreme/codeigniter.svg" height="70" alt="API Blog App">
    <h1>API Blog App</h1>
    <strong>Sebuah API sederhana yang dapat melakukan CRUD untuk sebuah aplikasi blog mengunakan CodeIgniter3</strong>
</div>
<br>
<div align="center">
    <a href="https://drone-gh.zecrea.my.id/FP-PEMWEB-KEL-7/Backend">
        <img src="https://drone-gh.zecrea.my.id/api/badges/FP-PEMWEB-KEL-7/Backend/status.svg" alt="CI/CD">
    </a>
</div>
<div align="center">
    <br>
    <a href="https://pemwebfp.zecrea.my.id/"><b>Website</b></a>
</div>

## API Route
| URL | METHOD | GET PARAMETER | POST DATA | DESKRIPSI | Selesai |
| -   |-       | -             | -         | -         | -        |
| api/user/all | GET | None | None | Untuk mengambil semua user data (tanpa password) | ✅ |
| api/user/(id&#124;name)/(any) | GET | None | None | Untuk mengambil user data berdasarkan id, atau name | ✅ |
| api/user/(id&#124;email&#124;name&#124;password) | POST | None | `value=any` | Untuk mengambil user data berdasarkan id, email, name, atau password | ✅ |
| api/login | POST | None | `email=string&password=string` | Untuk melakukan login | ✅ |
| api/logout | GET | None | None | Untuk melakukan logout | ✅ |
| api/register | POST | None | `email=string&password=string&name?=string` | Untuk melakukan register | ✅ |
| api/article/all |	GET | None | None | Untuk mengambil semua artikel | ✅ |
| api/article/(:num) | GET | None | None | Untuk mengambil artikel berdasarkan id | ✅ |
| api/article/author/(:num) | GET | None | None | Untuk mengambil artikel berdasarkan id author | ✅ |
| api/article/(:num)/delete | GET | None | None | Untuk menghapus artikel berdasarkan id | ✅ |
| api/article/create | POST | None | `title=string&content=string` | Untuk membuat artikel | ✅ |
| api/article/(:num)/update | POST | None | `title?=string&content?=string` | Untuk mengubah artikel berdasarkan id | ✅ |
| api/profile | GET | None | None | Untuk mengambil profile | ❌ |
| api/profile/update | POST | None | `name?=string&email?=string&password?=string` | Untuk mengubah profile | ❌ |

Semua API route menghasilkan (return) JSON seperti berikut:
```json
{
	"error": boolean,
	"message": string,
	"data": array | null
}
```
## Jika ingin menggunakan dengan xampp (localhost)
1. Download repository ini
2. Extract file zipnya ke dalam htdocs (xampp)
3. Import `database.sql` menggunakan phpMyAdmin xampp
4. Jika folder extract tidak pada root atau htdocs-nya bercabang, maka ubah `$config['base_url'] = '';` sesuai dengan folder (extract) yang digunakan
5. Ubah `hostname`, `username`, dan `password` sesuai dengan yand di xampp. Ubahlah variabel tersebut pada file `application/config/database.php`
6. Selesai, silahkan buka browser dan lihat `localhost` atau `localhost/path`
## Cara Kontribusi
- Untuk membuat / mengubah / menghapus route, silahkan lakukan di file `application/config/routes.php`
- Untuk membuat / mengubah / menghapus logic sebuah route, silahkan lakukan di file `application/controllers/[nama_controller].php`
- Untuk melakukan interaksi dengan database, silahkan lakukan di file `application/models/[nama_model].php`

## Open diskusi
Silahkan ajukan pertanyaan ke [Discussion](https://github.com/FP-PEMWEB-KEL-7/Backend/discussions) atau Grup Whatsapp
