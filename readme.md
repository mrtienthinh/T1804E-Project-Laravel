# T1804E semeter 2 Aptech:

## Implementation Environment
-	PHP
-   HTML5, CSS3, JavaScript
-	Laravel Library
-	JQuery, Bootstrap


## Installation
* Step 1:

```bash
git clone git@github.com:mrtienthinh/blog.git
```

* Step 2:

```bash
composer update
```

* Step 3:

```bash
php artisan migrate:fresh
```

* Stepp 4:

```bash
php artisan db:seed
```

* Step 5:

```bash
php artisan serve
```
* Step 6: To link image storage/app/public/posts_image to public/storage/posts_image

```bash
php artisan storage:link
```

## Login account to test

| Account | Password | Type|
| - | - | - |
| thinh@thinh.com | 123123 | isAdmin |
| dat@dat.com | 123123 | isAuthor |
| thanh@thanh.com | 123123 | isUser |

## User case
![Use case](https://user-images.githubusercontent.com/41829799/57977793-0efa2380-7a2a-11e9-8132-b60f4740c009.jpg)

## Database diagram
![diagram](https://user-images.githubusercontent.com/41829799/57977796-26d1a780-7a2a-11e9-8870-0a7d9d564f9e.jpg)

## View

### Login
![image](https://user-images.githubusercontent.com/41829799/57977822-90ea4c80-7a2a-11e9-9dba-68d2f351668e.png)

### Homepage
![image](https://user-images.githubusercontent.com/41829799/57977827-b414fc00-7a2a-11e9-971b-f4e661302437.png)

### Overview a post on homepage
![image](https://user-images.githubusercontent.com/41829799/57977839-cee77080-7a2a-11e9-8d35-811c12b56ebd.png)

### Full detail of a post
![image](https://user-images.githubusercontent.com/41829799/57977844-eb83a880-7a2a-11e9-8ab6-5b1e79a8b961.png)

### Leave a comment
![image](https://user-images.githubusercontent.com/41829799/57977849-0229ff80-7a2b-11e9-8d5b-6ff390ce9269.png)

### Admin manage post
![image](https://user-images.githubusercontent.com/41829799/57977859-31407100-7a2b-11e9-9ce3-64fd1a4b0af1.png)

### Manage user
![image](https://user-images.githubusercontent.com/41829799/57977867-47e6c800-7a2b-11e9-8759-504d651bba66.png)

### Other view in Documents
```sh
cd \Documents
```
**Free Software, Hell Yeah!**



