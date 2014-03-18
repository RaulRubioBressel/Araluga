iris.ui(

    function (self) {

        self.create = function () {
            console.log("Instructions Ui Created");
            self.tmpl(iris.path.uis.instructions.html);
        };

        self.awake = function () {
            console.log("Instructions Ui Awakened");
        };

        self.sleep = function () {
            console.log("Instructions Ui Asleep"); //Never called
        };

        self.destroy = function () {
            console.log("Instructions Ui Destroyed");//Never called
        };

    },
    iris.path.uis.instructions.js  
 );