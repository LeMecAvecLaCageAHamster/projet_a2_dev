cd /var/www/html
git clone https://github.com/LeMecAvecLaCageAHamster/projet_a2_dev.git
cp projet_a2_dev/betterave.conf /etc/apache2/site-available
ln -s /etc/apache2/site-available/betterave.conf /etc/apache2/site-enable/betterave.conf
service apache2 restart
xdg-open localhost:1234