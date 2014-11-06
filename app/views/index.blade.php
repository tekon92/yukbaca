@extends('_partials/layout')



<!-- page content -->
@section('content')
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>
           Yukbaca
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8" ng-controller="projects">
          <h2>
            projects
          </h2>
          <div class="categories btn-group">
            <button
              type="button"
              class="category btn btn-default active"
              ng-click="projects.setCategory(null)"
              ng-class="{ 'active' : projects.category == null }"
            >
              All
            </button>
            <button
              type="button"
              class="category btn btn-default"
              ng-repeat="category in projects.categories"
              ng-click="projects.setCategory(category)"
              ng-class="{ 'active' : projects.category.id == category.id }"
            >
              @{{ category.name }}
            </button>
          </div>
          <div class="projects">
            <div
              class="project media"
              ng-repeat="project in projects.projects | filter : projects.filterByCategory"
            >
              <button
                type="button"
                class="pull-left btn btn-default"
                ng-click="projects.addToBasket(project)"
              >
                Add to basket
              </button>
              <div class="media-body">
                <h4 class="media-heading">@{{ project.name }}</h4>
                <p>
                  Price: @{{ project.price }}, Stock: @{{ project.stock }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" ng-controller="basket">
          <h2>
            Basket
          </h2>
          <form class="basket">
            <table class="table">
              <tr
                class="project"
                ng-repeat="project in basket.projects track by $index"
                ng-class="{ 'hide' : basket.state != 'shopping' }"
              >
                <td class="name">
                  @{{ project.name }}
                </td>
                <td class="quantity">
                  <input
                    class="form-control"
                    type="number"
                    ng-model="project.quantity"
                    ng-change="basket.update()"
                    min="1"
                  />
                </td>
                <td class="project">
                  @{{ project.total }}
                </td>
                <td class="project">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    ng-click="basket.remove(project)"
                  ></a>
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="email"
                    ng-model="basket.email"
                  />
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <input
                    type="password"
                    class="form-control"
                    placeholder="password"
                    ng-model="basket.password"
                  />
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <button
                    type="button"
                    class="pull-left btn btn-default"
                    ng-click="basket.authenticate()"
                  >
                    Authenticate
                  </button>
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="card number"
                    ng-model="basket.number"
                  />
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="expiry"
                    ng-model="basket.expiry"
                  />
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="security number"
                    ng-model="basket.security"
                  />
                </td>
              </tr>
              <tr>
                <td
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <button
                    type="button"
                    class="pull-left btn btn-default"
                    ng-click="basket.pay()"
                  >
                    Pay
                  </button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
@stop