 <div class=" row margin-leftright-null health-related-questions">
  <div class="col-md-12 padding-leftright-null">
      <div class="text padding-bottom-null text-center">
          <h2 class="title center margin-bottom-small home-title">New Health Related Questions</h2>
      </div>
  </div>
  @if(isset($questions))
  @foreach($questions as $question)
  <div class="col-md-4">
    <div class="heqlth-queation-area">
      <div class="heqlth-queation">
      <p>{!! $question->description or '' !!}</p>
        <a href="{!! route('frontend.question.show', $question->id) !!}">View Answer...</a>
      </div>
      <div class="ans-info">
        <div class="meta-info ques-meta">
            <span><strong>Topics:&nbsp;&nbsp;</strong> @foreach(array_slice($question->topics, 0, 1) as $topic)<a href="{!! route("frontend.question.topics", $topic->id) !!}" class="tag"><p>{!! $topic->title !!}</p></a>@endforeach</span>
        </div>
    </div>
    </div>
  </div>
@endforeach
  @endif
  <div class="more-tips more-qs-btn">
    <a href="{!! route('frontend.all_questions') !!}" class="btn margin-null more">More Questions</a>
  </div>
</div>
