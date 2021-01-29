<div class="col-lg-3 col-md-6">
  <div class="panel panel-'.$modulo->__get('color').'">
      <div class="panel-heading">
          <div class="row">
              <div class="col-xs-6" style="height:60px">
                  <i class="fa '.$modulo->__get('modFoto').' fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class="huge">'.$modulo->__get('modNombre').'</div>
                  <div>'.$modulo->__get('modDescripcion').'</div>
              </div>
          </div>
      </div>

      <a href="'.$modulo->__get('codigo').'">
              <div class="panel-footer">
              <span class="pull-left">View Details</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
          </div>
      </a>
  </div>
</div>
