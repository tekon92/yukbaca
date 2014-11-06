var app = angular.module("app", ["ngCookies"]);

app.factory("CategoryService", function($http) {
  return {
    "getCategories": function() {
      return $http.get("/category/index");
    }
  };
});

app.factory("ProjectService", function($http) {
  return {
    "getProjects": function() {
      return $http.get("/project/index");
    }
  };
});

app.factory("BasketService", function($cookies) {

  var projects = JSON.parse($cookies.projects || "[]");

  return {

    "getProjects" : function() {
      return projects;
    },

    "add" : function(project) {

      projects.push({
        "id"       : project.id,
        "name"     : project.project_name,
        "price"    : project.price,
        "total"    : project.price * 1,
        "quantity" : 1
      });

      this.store();
    },

    "remove" : function(project) {

      for (var i = 0; i < projects.length; i++) {

        var next = projects[i];

        if (next.id == project.id) {
          projects.splice(i, 1);
        }

      }

      this.store();

    },

    "update": function() {

      for (var i = 0; i < projects.length; i++) {

        var project = projects[i];
        var raw     = project.quantity * project.price;

        project.total = Math.round(raw * 100) / 100;

      }

      this.store();

    },

    "store" : function() {
      $cookies.projects = JSON.stringify(projects);
    },

    "clear" : function() {
      projects.length = 0;
      this.store();
    }

  };

});

app.factory("UserService", function(
  $http
) {

  var user = null;

  return {
    "authenticate": function(email, password) {

      var request = $http.post("/user/authenticate", {
        "email"    : email,
        "password" : password
      });

      request.success(function(data) {
        if (data.status !== "error") {
          user = data.user;
        }
      });

      return request;

    },
    "getUser": function() {
      return user;
    }
  };
});

app.factory("OrderService", function(
  $http,
  UserService,
  BasketService
) {
  return {
    "pay": function(number, expiry, security) {

      var user  = UserService.getUser();
      var projects = BasketService.getProjects();
      var items    = [];

      for (var i = 0; i < projects.length; i++) {

        var project = projects[i];

        items.push({
          "project_id" : project.id,
          "quantity"   : project.quantity
        });

      }

      return $http.post("/order/add", {
        "user"  : user.id,
        "items"    : JSON.stringify(items),
        "number"   : number,
        "expiry"   : expiry,
        "security" : security
      });
    }
  };
});

app.controller("projects", function(
  $scope,
  CategoryService,
  ProjectService,
  BasketService
) {

  var self = this;

  var categories = CategoryService.getCategories();

  categories.success(function(data) {
    self.categories = data;
  });

  var projects = ProjectService.getProjects();

  projects.success(function(data) {
    self.projects = data;
  });

  this.category = null;

  this.filterByCategory = function(project) {

    if (self.category !== null) {
      return project.category.id === self.category.id;
    }

    return true;

  };

  this.setCategory = function(category) {
    self.category = category;
  };

  this.addToBasket = function(project) {
    BasketService.add(project);
  };

  $scope.projects = this;

});

app.controller("main", function($scope) {
  $scope.main = this;
});

app.controller("basket", function(
  $scope,
  UserService,
  BasketService,
  OrderService
) {

  var self = this;

  this.projects = BasketService.getProjects();

  this.update = function() {
    BasketService.update();
  };

  this.remove = function(project) {
    BasketService.remove(project);
  };

  this.state    = "shopping";
  this.email    = "";
  this.password = "";
  this.number   = "";
  this.expiry   = "";
  this.secutiry = "";

  this.authenticate = function() {

    var details = UserService.authenticate(self.email, self.password);

    details.success(function(data) {
      if (data.status == "ok") {
        self.state = "paying";
      }
    });

  }

  this.pay = function() {

    var details = OrderService.pay(
      self.number,
      self.expiry,
      self.security
    );

    details.success(function(data) {
      BasketService.clear();
      self.state = "shopping";
    });

  }

  $scope.basket = this;

});