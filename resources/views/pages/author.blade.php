@extends('layouts.front')

@section('title')
    Author 
@endsection
@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
@endsection

@section('content')

<div class="check">
    <div class="container">
        <div class="row">
    	<div class="col-md-3" id="proba">
    		<div class="reg">
				<h3>About Me</h3>
                <div class="img">
                    <img src="{{ asset('/') }}images/ja.png" id="hdnDest" width="250px" alt="" class="img-responsive gri-wid">
                 </div>
			</div>
            <div class="info">
                <div class="pull-left styl-hdn">
                    <h3>Stefan Nikitin</h3>
                </div>
                <div class="pull-right">
                    <p><a href="www.linkedin.com/in/stefan-nikitin43" class="active"><span class="fa fa-user" aria-hidden="true"></span> <span class=" item_price"></span></a></p>
                </div>
        	</div>
			<div class="clearfix"></div>
        </div>
        <div class="col-md-9">
            <div class="float-qty-chart">
                @foreach($questions as $question)
                    @if($loop->first)
                <div class="pull-left reg">
                    <h3>Vote : {{ $question->question }}</h3>
                </div>
                    @endif
                @endforeach
                    {{ csrf_field() }}
                    <table class="table">
                        <tr>
                            <th>Radio</th>
                            <th>Answer</th>
                            <th>Percent of votes</th>
                        </tr>

                        @foreach($questions as $question)
                        <tr>
                            <input type="hidden" id="hiddenQ" name="hiddenQ" value="{{ $question->q_id }}"/>
                            <td><input type="radio" id="ocena" name="ocena" value="{{ $question->thm_id }}"/></td>
                            <td><label>{{ $question->theme }}</label></td>
                            <td><span class="smesti"><progress value="{{ ($question->numberof*100)/$brojGlasova }}" max="100"></progress>{{ round(($question->numberof*100)/$brojGlasova,1)."%" }}</span></td>
                        </tr>
                        @endforeach
                    
                    <div class="info">
                        @if(session()->get('user'))
                        <tr><td colspan="3" align="center"><button type="submit" class="btn btn-social" id="predaj" name="predaj" onclick="predajFormu()">SUBMIT</button></td></tr>
                        @endif
                    </div>
                    </table>
            </div>
            <div class="clearfix"></div>
           <div class="showcase-last">
                <h4>My Bio :</h4>
                
                    <a class="btn btn-primary" href="images/cv-Stefan Nikitin-eng.pdf" target="_blank" role="button"><h4>MY CV</h4> <span class="fa fa-download"></span></a>
                
            </div>
    	   <div class="clearfix"></div>
		</div>
    </div>
    <div class="col-md-9 my-4" id="success"></div>
	</div>
</div>
@endsection

@section('appendJavascript')
    @parent
@endsection