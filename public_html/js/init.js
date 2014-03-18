//CARGAMOS EL OBEJTO IRIS.PATH CON TODOS LOS COMPONENTES DE LA PAGINA SCREENS Y UIS
iris.path = {
        screens: {
		welcome: {js: "js/js_screens/welcome.js", html: "screens/welcome.html"},
                register: {js: "js/js_screens/register.js", html: "screens/register.html"},
                start: {js: "js/js_screens/start.js", html: "screens/start.html"}
	},
	uis: {
		instructions: {js: "js/js_uis/instructions.js", html: "uis/instructions.html"},
		begin: {js: "js/js_uis/begin.js", html: "uis/begin.html"},
		contact: {js: "js/js_uis/contact.js", html: "uis/contact.html"},
		map: {js: "js/js_uis/map.js", html: "uis/map.html"},
		exercises: {js: "js/js_uis/exercises.js", html: "uis/exercises.html"},		
		profile: {js: "js/js_uis/profile.js", html: "uis/profile.html"},
                writeExercise: {js: "js/js_uis/writeExercise.js", html: "uis/writeExercise.html"},
                dropExercise: {js: "js/js_uis/dropExercise.js", html: "uis/dropExercise.html"},
                selectExercise: {js: "js/js_uis/selectExercise.js", html: "uis/selectExercise.html"},
                finalPage: {js: "js/js_uis/finalPage.js", html: "uis/finalPage.html"},
	},
	resource: {
                user: "resources/userAjax.js",
                araluga: "resources/araluga.js",
                map: "resources/mapAjax.js"
        }
};
$(document).ready(
    function () {
        iris.baseUri("./"); //Optional: It sets de base directory of the application
        iris.welcome(iris.path.screens.welcome.js); //It loads the behavior file of the welcome Screen
    }
);