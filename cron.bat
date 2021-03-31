@echo off
set "PATH=%PATH%;A:\xampp\htdocs\codeigniter"
call A:
call cd xampp\htdocs\codeigniter
:loop
call php index.php Tools
@REM PING 1.1.1.1 -n 3 -w 10000 >NUL
@REM goto :loop

pause
