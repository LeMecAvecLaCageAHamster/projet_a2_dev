cd /var/www/html/
git clone https://github.com/LeMecAvecLaCageAHamster/projet_a2_dev.git
cd projet_a2_dev
sudo cp betterave.conf /etc/apache2/sites-available
sudo ln -s /etc/apache2/sites-available/betterave.conf /etc/apache2/sites-enabled/betterave.conf
mysql -u root -p < documents/betterave.sql
service apache2 restart
# xdg-open http://localhost:1234
