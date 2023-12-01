FROM whatwedo/nginx-php:v2.7 AS base

WORKDIR /var/www

FROM base AS dev

ARG DDE_UID
ARG DDE_GID

COPY .dde/configure-image.sh /tmp/dde-configure-image.sh
RUN /tmp/dde-configure-image.sh

FROM base AS prod

ADD . /var/www
