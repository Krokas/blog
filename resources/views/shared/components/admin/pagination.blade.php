<nav>
    <ul class="pagination">
      <li class="page-item @if($collection->currentPage() - 1 == 0) disabled @endif">
        <a
            class="page-link"
            href="{{ $collection->getOptions()['path'] . '?' . $collection->getOptions()['pageName']
                . "=" . $collection->currentPage() - 1 }}"
                >@lang('admin.labels.previous')</a>
      </li>
      {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
      <li class="page-item @if($collection->currentPage() + 1 > $collection->lastPage()) disabled @endif">
        <a
            class="page-link"
            href="{{ $collection->getOptions()['path'] . '?' . $collection->getOptions()['pageName']
            . "=" . $collection->currentPage() + 1 }}"
            >@lang('admin.labels.next')</a>
      </li>
    </ul>
  </nav>
