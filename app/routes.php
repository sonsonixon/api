<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->group('/table', function () use ($app) {
	
	$app->get("", 	"App\Controllers\TableController:get");
	$app->post("", 	"App\Controllers\TableController:add");
	$app->post("/{id}", 	"App\Controllers\TableController:update");
	$app->delete("/{id}", 	"App\Controllers\TableController:delete");

});

$app->group('/users', function () use ($app) {
	
	$app->get("", 	"App\Controllers\UsersController:getAllUsers");
	
	$app->post("/add", 	"App\Controllers\UsersController:addUser");

	$app->get("/get/{uuid}", 	"App\Controllers\UsersController:getUser");

	$app->post("/update/{uuid}", 	"App\Controllers\UsersController:updateUser");

	// ->add(new App\Middlewares\Authentication()) // Add middleware to route

	/*
	$app->post("", 	"App\Controllers\TableController:add");
	$app->post("/{id}", 	"App\Controllers\TableController:update");
	$app->delete("/{id}", 	"App\Controllers\TableController:delete");
	*/
	
});
