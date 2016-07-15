<div id="ng-app" ng-app="app"> <!-- id="ng-app" IE<8 -->
    <!-- Example: nv-file-drop="" uploader="{Object}" options="{Object}" filters="{String}" -->
    <div ng-controller="AppController" nv-file-drop="" uploader="uploader">

        <div class="container">
            <div class="form-group">

                <div class="row">


                    <div class="col-md-9" style="margin-bottom: 40px">
                        <h2>Selecciona las imagenes para tu &aacute;lbum</h2>
                        <div class="form-group">
                            {!! Form::input('file',null,'',[
                                'nv-file-select' => '',
                                'uploader' => 'uploader',
                                'multiple',
                                'class' => 'form-control'
                         ]) !!}
                        </div>
                        <p>Queue length: <% uploader.queue.length %></p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="50%">Nombre</th>
                                <th ng-show="uploader.isHTML5">Tamano</th>
                                <th ng-show="uploader.isHTML5">Progreso</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in uploader.queue">
                                <td>
                                    <strong><% item.file.name %></strong>
                                    <!-- Image preview -->
                                    <!--auto height-->
                                    <!--<div ng-thumb="{ file: item.file, width: 100 }"></div>-->
                                    <!--auto width-->
                                    <div ng-show="uploader.isHTML5" ng-thumb="{ file: item._file, height: 100 }"></div>
                                    <!--fixed width and height -->
                                    <!--<div ng-thumb="{ file: item.file, width: 100, height: 100 }"></div>-->
                                </td>
                                <td ng-show="uploader.isHTML5" nowrap><% item.file.size/1024/1024|number:2 %> MB</td>
                                <td ng-show="uploader.isHTML5">
                                    <div class="progress" style="margin-bottom: 0;">
                                        <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
                                    <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
                                    <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
                                </td>
                                <td nowrap>
                                    <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
                                        <span class="glyphicon glyphicon-upload"></span> Subir
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
                                        <span class="glyphicon glyphicon-ban-circle"></span> Cancelar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
                                        <span class="glyphicon glyphicon-trash"></span> Eliminar
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div>
                            <div>
                                Queue progress:
                                <div class="progress" style="">
                                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': uploader.progress + '%' }"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-s" ng-click="uploader.uploadAll()" ng-disabled="!uploader.getNotUploadedItems().length">
                                <span class="glyphicon glyphicon-upload"></span> Subir Fotos
                            </button>
                            <button type="button" class="btn btn-warning btn-s" ng-click="uploader.cancelAll()" ng-disabled="!uploader.isUploading">
                                <span class="glyphicon glyphicon-ban-circle"></span> Cancelar
                            </button>
                            <button type="button" class="btn btn-danger btn-s" ng-click="uploader.clearQueue()" ng-disabled="!uploader.queue.length">
                                <span class="glyphicon glyphicon-trash"></span> Limpiar
                            </button>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Fix for old browsers -->
<script src="http://nervgh.github.io/js/es5-shim.min.js"></script>
<script src="http://nervgh.github.io/js/es5-sham.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!--<script src="../bower_components/angular/angular.js"></script>-->
<script src="http://code.angularjs.org/1.1.5/angular.min.js"></script>
<script src="{{asset('assets/angular/angular-file-upload.js')}}"></script>
<script src="{{asset('assets/angular/controllers.js')}}"></script>

<!--thumbnails for images-->
<script src="{{asset('assets/angular/directives.js')}}"></script>
<script src="{{asset('assets/jquery/addPhotos.js')}}"></script>

<style>
    .my-drop-zone { border: dotted 3px lightgray; }
    .nv-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
    .another-file-over-class { border: dotted 3px green; }

    html, body { height: 100%; }

    canvas {
        background-color: #f3f3f3;
        -webkit-box-shadow: 3px 3px 3px 0 #e3e3e3;
        -moz-box-shadow: 3px 3px 3px 0 #e3e3e3;
        box-shadow: 3px 3px 3px 0 #e3e3e3;
        border: 1px solid #c3c3c3;
        height: 100px;
        margin: 6px 0 0 6px;
    }
</style>