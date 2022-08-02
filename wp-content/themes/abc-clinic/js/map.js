ymaps.ready(function(){
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчнию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [54.33450522873333,48.3991843306884],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 17,
        controls: ['routeButtonControl','typeSelector', 'zoomControl', 'trafficControl', 'fullscreenControl']

    });
    myMap.behaviors.disable('scrollZoom');

    var control = myMap.controls.get('routeButtonControl');

    // Откроем панель для построения маршрутов.
    control.state.set('expanded', false);



    var myPlacemark = new ymaps.Placemark([54.33450522873333,48.3991843306884], {
        // Хинт показывается при наведении мышкой на иконку метки.
        iconCaption: 'ABC - Клиника',
        balloonContentHeader: 'ABC - Клиника',
        // Балун откроется при клике по метке.
        balloonContent: 'Медицинский центр </br><i class="fa fa-map-marker-alt"></i> ул. Радищева 109 / 18А'+
            '</br><i class="fa fa-phone"></i> +7 (800) 707-02-03'
    });

// После того как метка была создана, ее
// можно добавить на карту.
    myMap.geoObjects.add(myPlacemark);

});