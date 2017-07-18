@extends('layouts.app')
@section('css')
@stop
@section('content')
    <div class="container">
        <br/>
        <br/>
        <div ng-controller="CarController as vm">
            <div class="well well-sm">
                <form ng-submit="vm.addCar()">
                    <div class="form-group">
                        <label id="marca"> Marca</label>
                        <select ng-model="vm.params.id_marca" id="marca" class="form-control" required>
                            <option value="">Selecione uma Marca</option>
                            <option value="@{{ marca.id }}" ng-repeat="marca in vm.marcaList"> @{{ marca.name }}</option>
                        </select>
                        <label> Nome
                            <input type="text" name="name" ng-model="vm.params.name" class="form-control" required/>
                        </label>
                        <label> Ano
                            <input type="text" name="ano" ng-model="vm.params.ano" class="form-control" required/>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Adicionar Carro
                    </button>
                </form>
            </div>
            <section id="no-data" ng-if="vm.carList.length <= 0">
                <div class="alert alert-danger">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                    No Data
                </div>
            </section>
            <section id="data" ng-if="vm.carList.length > 0">
                <div class="panel " ng-class="{'panel-primary': vm.edit[i], 'panel-success': !vm.edit[i]}" ng-repeat="(i, list) in vm.carList" ng-if="vm.carList.length > 0">
                    <div class="panel-heading">
                        <table class="table table-stripped">
                            <thead>
                            <tr class="text-center">
                                <th class="col-md-2">#</th>
                                <th class="col-md-2">Marca</th>
                                <th class="col-md-2">Modelo</th>
                                <th class="col-md-2">Ano</th>
                                <th class="col-md-2">Editar</th>
                                <th class="col-md-2">Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td ng-bind="list.id"></td>
                                <td ng-bind="list.marca.name + ' (' + list.marca.abreviatura + ')'"></td>
                                <td ng-bind="list.name"></td>
                                <td ng-bind="list.ano"></td>
                                <td>
                                    <label>
                                        <input type="checkbox" checked autocomplete="off" ng-model="vm.edit[i]">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group" data-toggle="buttons">
                                        <button class="btn btn-danger btn-block" ng-click="vm.deleteCar(list.id)">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body" ng-if="vm.edit[i]" ng-show="vm.edit[i]">
                        <form ng-submit="vm.editCar(list.id, i, list)">
                            <div class="form-group">
                                <label id="marca"> Marca</label>
                                <select ng-model="list.id_marca" id="marca" class="form-control" required>
                                    <option value="">Selecione uma Marca</option>
                                    <option value="@{{ marca.id }}" ng-repeat="marca in vm.marcaList"> @{{ marca.name }}</option>
                                </select>
                                <label> Nome
                                    <input type="text" name="name" ng-model="list.name" class="form-control" required/>
                                </label>
                                <label> Ano
                                    <input type="number" name="ano" ng-model="list.ano" class="form-control" required/>
                                </label>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-success" type="submit">
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop


@section('javascript-bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script>

        angular.module("app", [])
                .controller("CarController", ["$scope", "$http", 'CarFactory', 'MarcaFactory', function($scope, $http, CarFactory, MarcaFactory) {
                    var vm = this;
                    vm.carList = [];
                    vm.marcaList = [];
                    vm.edit = [];
                    vm.params = {};

                    vm.addCar = function(){
                        CarFactory.insert(vm.params).then(function(result){
                            var d = result.data;
                            if(d.success)
                                vm.showCars();
                        });
                    };
                    vm.editCar = function(id, i, params){
                        if(vm.edit[i]){
                            CarFactory.edit(id, params).then(function(result){
                                var d = result.data;
                                if(d.success)
                                    vm.showCars();
                            });
                        }
                    };
                    vm.showCars = function(){
                        CarFactory.showAll().then(function(result){
                            vm.carList = result.data;
                        });
                    };

                    vm.deleteCar = function(id){
                        CarFactory.delete(id).then(function(result){
                            var d = result.data;
                            if(d.success)
                                vm.showCars();
                        });
                    };
                    vm.showMarcas = function(){
                        MarcaFactory.getMarcas().then(function(result){
                            vm.marcaList =  result.data;
                        });
                    };
                    vm.showCars();
                    vm.showMarcas();
                }])
                .factory('MarcaFactory', function($http){
                    var MarcaFactory = {};
                    var url = 'api/marcas/';
                    MarcaFactory.getMarcas = function(){
                        return $http.get(url);
                    };
                    return MarcaFactory;
                })
                .factory('CarFactory', function($http){
                    var CarFactory = {};
                    var url = 'api/carros/';

                    CarFactory.showAll = function(){
                        return $http.get(url);
                    };
                    CarFactory.insert = function(params){
                        return $http.post(url, params);
                    }
                    CarFactory.delete = function(id){
                        return $http.delete(url + id);
                    }
                    CarFactory.edit = function(id, params){
                        return $http.put(url + id, params);
                    }
                    return CarFactory;
                });
    </script>
@stop