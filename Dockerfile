FROM bitnami/laravel:10.3.3-debian-12-r5

COPY scripts/liblaravel.sh /opt/bitnami/scripts

WORKDIR /app
ENTRYPOINT [ "/opt/bitnami/scripts/laravel/entrypoint.sh" ]
CMD [ "/opt/bitnami/scripts/laravel/run.sh" ]
