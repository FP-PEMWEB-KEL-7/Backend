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
| URL | METHOD | GET PARAMETER | POST DATA | DESKRIPSI |
| -   |-       | -             | -         | -         |
| api/user/all | GET | None | None | Untuk mengambil semua user data (tanpa password) |
| api/user/(id|name)/(any) | GET | None | None | Untuk mengambil user data berdasarkan id, atau name |
| api/user/(id|email|name|password) | POST | None | `value=any` | Untuk mengambil user data berdasarkan id, email, name, atau password |
| api/login | POST | None | `email=string&password=string` | Untuk melakukan login |
| api/logout | GET | None | None | Untuk melakukan logout |
| api/register | POST | None | `email=string&password=string&name?=string` | Untuk melakukan register |
| api/article/all |	GET | None | None | Untuk mengambil semua artikel |
| api/article/(:num) | GET | None | None | Untuk mengambil artikel berdasarkan id |
| api/article/author/(:num) | GET | None | None | Untuk mengambil artikel berdasarkan id author |
| api/article/(:num)/delete | GET | None | None | Untuk menghapus artikel berdasarkan id |
| api/article/create | POST | None | `title=string&content=string` | Untuk membuat artikel |
| api/article/(:num)/update | POST | None | `title?=string&content?=string` | Untuk mengubah artikel berdasarkan id |
Semua API route menghasilkan (return) JSON seperti berikut:
```json
{
	"error": boolean,
	"message": string,
	"data": array | null
}
```
