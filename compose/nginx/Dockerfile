FROM nginx:1.23.0

RUN apt-get update
RUN apt-get install -y apt-utils autoconf automake build-essential git libcurl4-openssl-dev libgeoip-dev liblmdb-dev libpcre++-dev libtool libxml2-dev libyajl-dev pkgconf wget zlib1g-dev

WORKDIR /opt

RUN git clone --recursive --depth 1 -b v3/master --single-branch https://github.com/SpiderLabs/ModSecurity
WORKDIR /opt/ModSecurity

RUN ./build.sh
RUN ./configure
RUN make
RUN make install

WORKDIR /opt

RUN git clone --depth 1 https://github.com/SpiderLabs/ModSecurity-nginx.git
RUN wget http://nginx.org/download/nginx-1.23.0.tar.gz && tar zxf nginx-1.23.0.tar.gz

WORKDIR /opt/nginx-1.23.0

RUN ./configure --with-compat --add-dynamic-module=../ModSecurity-nginx
RUN make modules
RUN cp objs/ngx_http_modsecurity_module.so /etc/nginx/modules

WORKDIR /opt

RUN mkdir /etc/nginx/modsec
RUN wget -P /etc/nginx/modsec/ https://raw.githubusercontent.com/SpiderLabs/ModSecurity/v3/master/modsecurity.conf-recommended
RUN mv /etc/nginx/modsec/modsecurity.conf-recommended /etc/nginx/modsec/modsecurity.conf
RUN cp ModSecurity/unicode.mapping /etc/nginx/modsec
RUN sed -i 's/SecRuleEngine DetectionOnly/SecRuleEngine On/' /etc/nginx/modsec/modsecurity.conf

COPY compose/nginx/modsec-main.conf /etc/nginx/modsec/main.conf

COPY compose/nginx/nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www/html
