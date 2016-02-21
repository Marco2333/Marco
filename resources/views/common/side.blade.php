<div id="side-bar" class="col-sm-3">
	<div class="panel panel-default wow bounceInRight">
	    <div class="panel-heading">
	        <h3 class="panel-title">最新随笔</h3>
	    </div>
	    <div class="panel-body">
	        <ol>

	        	@foreach ($newBlog as $b) 
					<li class="one-line"><a href="{{ url('detail/'.$b->id) }}">{{ $b->title }}</a></li>
	        	@endforeach

	        </ol>
	    </div>
	</div>
	<div class="panel panel-default wow bounceInRight">
	    <div class="panel-heading">
	        <h3 class="panel-title">随笔分类</h3>
	    </div>
	    <div class="panel-body">
	        <ul>

	        	@foreach ($types as $t) 
					<li><a href="{{ url('/category/'.$t->id)}}">{{ $t->theme }}</a></li>
	        	@endforeach

	        </ul>
	    </div>
	</div>

	@if($links != null)
	
		<div class="panel panel-default  wow bounceInRight">
		    <div class="panel-heading">
		        <h3 class="panel-title">友情链接</h3>
		    </div>
		    <div class="panel-body">
		        <ul>

		        	@foreach ($links as $l) 
						<li><a href="{{ $l->url }}" target="_blank">{{ $l->text }}</a></li>
		        	@endforeach
		        	
		        </ul>
		    </div>
		</div>

	@endif
	

	@if($wise_words != null)
		
		<div class="panel panel-default  wow bounceInRight">
		    <div class="panel-heading">
		        <h3 class="panel-title">Wise Words</h3>
		    </div>

		    
		    <div class="panel-body">
		    	
		    	@foreach ($wise_words as $ww) 
					<p>{{ $ww->value}}</p>	
		        @endforeach
		       		        
		    </div>
		</div>

	@endif
	
</div>