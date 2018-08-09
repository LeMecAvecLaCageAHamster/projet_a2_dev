cd /var/www/html/
mkdir test_deployment
cd test_deployment
git clone https://github.com/LeMecAvecLaCageAHamster/projet_a2_dev.git
cp projet_a2_dev/betterave.conf /etc/apache2/site-available
ln -s /etc/apache2/site-available/betterave.conf /etc/apache2/site-enable/betterave.conf
mysql < documents/betterave.sql
service apache2 restart
xdg-open http://localhost:1234