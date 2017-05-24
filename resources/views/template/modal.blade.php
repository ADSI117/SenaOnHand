<!-- Modal Core -->
<div class="modal fade" id="modal-control" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="now-ui-icons ui-1_simple-remove"></i>
      </button>
      <h4 class="modal-title title-header">@yield('modal-title')</h4>
    </div>
    @yield('modal-content')
    {{-- <div class="modal-body">

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-info btn-simple">Save</button>
    </div> --}}
  </div>
</div>
</div>
