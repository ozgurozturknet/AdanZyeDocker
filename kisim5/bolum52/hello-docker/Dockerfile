# Bu örnek uygulama https://github.com/docker/labs/blob/master/beginner/chapters/webapps.md adresinden alınmıştır
# base imaj olarak nginx resmi imajını kullanıyoruz -- 
# https://github.com/nginxinc/docker-nginx/blob/5971de30c487356d5d2a2e1a79e02b2612f9a72f/mainline/buster/Dockerfile
FROM nginx:latest


# label ile de key value pair olarak bu imajla ilgili bilgileri giriyoruz. her iki talimat da imajın içindeki sistemle alakalı değil.
# her ikisi de imajın metadatasında saklanıyor. imajla alakali bilgiler. 
LABEL maintainer="Ozgur Ozturk @ozgurozturknet"
LABEL version="1.0"
LABEL name="hello-docker"

# bir adet env variable tanımlıyoruz. Daha sonra bunu runtime'da değiştireceğiz
ENV KULLANICI="Dunyali"

# nginx debian-slim imajı baz alınarak oluşturulmuştur.
# bu imajda geriye doğru uyumluluk sorunları var ve o nedenle update olmuyor. 
#Bu url'leri sources.list'e ekleyerek update olabilmesini sağlıyoruz
#RUN printf "deb http://archive.debian.org/debian/ jessie main\ndeb-src http://archive.debian.org/debian/ jessie main\ndeb http://security.debian.org jessie/updates main\ndeb-src http://security.debian.org jessie/updates main" > /etc/apt/sources.list

# Uygulama depolarından mevcut paketlerin en son listesini çekip güncelliyoruz. 
RUN apt-get update

# debian-slim'de bir çok tool mevcut değil. Bizim curl kullanmamız gerektiği için curl kuruyoruz
RUN apt-get install curl -y

# nginx web sayfalarını /usr/share/nginx/html folder'ında barındırıyor. O nedenle bu folder'a geçiyoruz
WORKDIR /usr/share/nginx/html

# web sitemizin açılış sayfası olan Hello_docker.html dosyasını buraya kopyalıyoruz.
COPY Hello_docker.html /usr/share/nginx/html

# sistemin düzgün çalıştığını ve nginx daemon'ının web sitesini publish etmekte bir sorun yaşamadığını test ediyoruz
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 CMD curl -f http://localhost/ || exit 1

# bu imajdan container yaratıldığı zaman çalışmasını istediğimiz komutu buraya giriyoruz
# /usr/share/nginx/html klasörüne geçiyor ve sed aracılığıyla Hello_docker.html dosyasının içerisindeki
# Kullanici kelimesini $KULLANICI env variable'ının değeriyle Hostname kelimesini de $HOSTNAME ile değiştiriyor ve 
# dosyanın içeriğini index.html'e adlı yeni bir dosyaya yazıyoruz.
# ardından nginx daemon'ı çalıştırıyoruz
CMD sed -e s/Kullanici/"$KULLANICI"/ Hello_docker.html > index1.html && sed -e s/Hostname/"$HOSTNAME"/ index1.html > index.html ; rm index1.html Hello_docker.html; nginx -g 'daemon off;'