@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? 'Default Title' }}</h3>

<div class="card-tools">
    @isset($collapsible)
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
        </button>
    @endisset

    @isset($removable)
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
    @endisset
</div>
</div>
    <div class="card-body">
        {{ $content ?? 'Start creating your amazing application!' }}
    </div>
<!-- /.card-body -->
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
    <!-- /.card-footer-->
      </div>
    <!-- /.card -->
    @endsection
