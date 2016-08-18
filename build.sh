echo "Removing old folders..."
rm -rf public/css public/js public/media tmp
rm htaccess
echo "Running gulp..."
gulp
mkdir tmp
mv .env tmp
mv yurukalimpong.com/env .env
mv yurukalimpong.com/htaccess .htaccess
tar -czvf ../yurukalimpong.tar.gz . --exclude='yurukalimpong.com' --exclude='tmp'
echo "Enter DB password..."
mysqldump -u homestead -p yurukali_yuru > ../yurukalimpong.sql 
mv tmp/.env .env
echo "Output: ../yurukalimpong.tar.gz ../yurukalimpong.sql"
