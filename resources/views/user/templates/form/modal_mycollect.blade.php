@if (count($mycollect) > 0)
<!-- modal collection -->
<div class="modal-dialog modal-lg modal-collect-user">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">@lang('text.modal.collection')</h4>
		</div>
		<div class="modal-body">
			<div class="user-collection">
					
				@foreach ($mycollect as $index => $item)
				<li id="mycollect{{$item->id}}" >
					<a  href="{{$item->thumbnail}}" download="{{$item->title}}">
						<div class="block-wrapper">
							<div class="block">
								<div class="block-img">
									<img class="img-full" src="{{$item->thumbnail}}" alt="{{ $item->title }}"/>
								</div>
								<div class="block-content">
									{{ $item->title }} <br> {{ $item->created_at }}
									<div class="delete">
										<a id="del_mycollect" data="mycollect{{$item->id}}" href="{{route('customer.delmycollect',$item->id)}}"><i class="fa fa-times" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</li>
				@endforeach
			</div>	
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-custom cus-2" data-dismiss="modal">@lang('text.modal.close')</button>
		</div>
	</div>
</div>
@endif