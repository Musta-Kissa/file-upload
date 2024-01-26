# How it works
## Users
In the file `users.txt` set a `{username} - {password hash}` pair
separated by a `-` (lines starting with a `#` will be ignored).
The password has to be hashed using the `md5` php function.
#### Adding a user using bash:
`echo "<?php echo '{username} - ' . md5('{password}'); ?>" | php >> users.txt`
### Files
Uploaded files will be stored in `./uploads/{username}/`
### Troubleshooting 
If the files aren't being saved it might be because the web server doesn't have write permissions it the `uploads` folder

