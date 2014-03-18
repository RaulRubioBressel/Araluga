iris.ui(

    function (self) {

        self.create = function () {
            console.log("Contacto Ui Created");
            self.tmpl(iris.path.uis.contact.html);
        };

        self.awake = function () {
            console.log("Contacto Ui Awakened");
        };

        self.sleep = function () {
            console.log("Contacto Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Contacto Ui Destroyed");//Never called
        };

    },
    iris.path.uis.contact.js  
 );