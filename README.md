$ composer create-project laravel/laravel real-time-app --prefer-dist

$ sudo nano /etc/apache2/sites-enabled/001-cloud9.conf
// Change this line
DocumentRoot /home/ubuntu/workspace

// To following
DocumentRoot /home/ubuntu/workspace/real-time-app/public