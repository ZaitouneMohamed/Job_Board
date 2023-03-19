@extends('user.master.master')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">mes information , CV & lettre
            </h3>
        </div>
        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("post")
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="cv" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose your cv</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>ville</label>
                    <select name="ville" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Fonction</label>
                    <select name="fonction" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>US phone mask:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" name="telephone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>lettre:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="lettre" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>experience</label>
                    <select name="experience" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>niveau d'etudes</label>
                    <select name="niveau_etudes" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Disponibilite</label>
                    <select class="form-control select2" name="disponibilite" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                    </select>
                </div>
                <div class="form-group clearfix">
                    <div class="icheck-success d-inline">
                        <input type="radio" name="sexe" value="homme" checked id="radioSuccess1">
                        <label for="radioSuccess1">homme
                        </label>
                    </div>
                    <div class="icheck-success d-inline">
                        <input type="radio" value="femme" name="sexe" id="radioSuccess2">
                        <label for="radioSuccess2">femme
                        </label>
                    </div>
                </div>
                <!-- /input-group -->
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
@endsection
