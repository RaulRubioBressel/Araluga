iris.ui(
    function(self) {

        var mapAjax = iris.resource(iris.path.resource.map);

        self.create = function() {
            console.log("Map Ui Created");
            self.tmplMode(self.APPEND);
            self.tmpl(iris.path.uis.map.html);

            mapAjax.createMap(function(data) {
                console.log(data);
                crearMap(data);
            });
        };

        self.awake = function() {
            console.log("Map Ui Awakened");
        };

        self.sleep = function() {
            console.log("Map Ui Asleep"); //Never called
        };

        self.destroy = function() {
            console.log("Map Ui Destroyed");//Never called
        };

        function crearMap(data) {
            //PINTAR LINEAS DEL MAPA
            linesMap(data, function (data) {
                //PINTAR LOS PUNTOS DEL MAPA
                pointsMap(data, function (data) {
                   //PINTAR LAS AREAS DEL MAPA
                   areasMap(data); 
                });
            });
        };

        function areasMap (data) {
            for (var i in data.result) {
                (function(i) {
                    var linkX = data.result[i].theme_coorX * proporcion * 1.25;
                    var linkfinalX = Number(linkX) + 20 * proporcion;

                    var linkY = data.result[i].theme_coorY * proporcion * 1.25;
                    var linkfinalY = Number(linkY) + 25 * proporcion;

                    $('<area />', {
                        shape: "rect",
                        coords: linkX + ", " + linkY + ", " + linkfinalX + ", " + linkfinalY,
                        href: "javascript:void(0)",
                        id: data.result[i].theme_id,
                        name: data.result[i].theme_name
                    }).mouseenter(function() {

                        console.log("dentro de area");

                    }).mouseleave(function() {

                        console.log("fuera de area");

                    }).on("click", function() {
                        $("#link-exercises").show();
                        var themesData = {
                            id: data.result[i].theme_id,
                            name: data.result[i].theme_name,
                            description: data.result[i].theme_description,
                            img: "/Araluga/public_html" + data.result[i].theme_img
                        };

                        iris.notify("exercises", themesData);
                        $("#link-exercises").click();
                        $("#link-exercises").hide();

                    }).appendTo($("#areas"));
                })(i);
            };
        };

        function pointsMap (data, callback) {
            for (var i in data.result) {
                puntos(data.result[i].theme_name, data.result[i].id, data.result[i].theme_coorX, data.result[i].theme_coorY, ctx);
            };
            callback(data);
        };

        function linesMap(data, callback) {
            var cont = 0;
            for (var i in data.result) {
                if (cont !== 0) {
                    ctx.moveTo(coorPrevX * proporcion + proporcion * 13, coorPrevY * proporcion + proporcion * 15);
                    ctx.quadraticCurveTo(data.result[i].vertex_coorX * proporcion, data.result[i].vertex_coorY * proporcion, data.result[i].theme_coorX * proporcion + proporcion * 13, data.result[i].theme_coorY * proporcion + proporcion * 15); //dibujar curva
                    ctx.stroke();
                    var coorPrevX = data.result[i].theme_coorX;
                    var coorPrevY = data.result[i].theme_coorY;

                } else {
                    coorPrevX = data.result[i].theme_coorX;
                    coorPrevY = data.result[i].theme_coorY;
                }
                cont++;
            }
            ;
            callback(data);
        };
    },
    iris.path.uis.map.js
);