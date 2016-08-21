php artisan migrate:refresh --seed
echo "Removing old folders..."
./refresh_media.sh
rm .htaccess
echo "Running gulp..."
gulp
gulp --production
mkdir -p tmp
mv .env tmp
echo "Copying configuration files..."
cp yurukalimpong.com/.env .env
cp yurukalimpong.com/.htaccess .htaccess
echo "Running optimizations..."
php artisan optimize --force
php artisan route:cache
echo "Creating tar ball..."
tar -czvf ../yurukalimpong.tar.gz . --exclude='yurukalimpong.com' --exclude='tmp'
echo "Enter DB password..."
mysqldump -u homestead -p yurukali_yuru > ../yurukalimpong.sql 
mv tmp/.env .env
echo "Output: ../yurukalimpong.tar.gz ../yurukalimpong.sql"
