@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('notification::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
    <div class="alert alert-{{ Session::get('flash_notification.level') }}{{ Session::get('flash_notification.important') }}">
        <div class="row">
            <div class="col-md-2 icon">
                <span class="glyphicon {{ config( 'notification.' . Session::get('flash_notification.level') ) }}" aria-hidden="true"></span>
            </div>
            <div class="col-md-10">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @if(Session::has('flash_notification.title'))
                    <p class="alert-title">{{ Session::get('flash_notification.title') }}</p>
                    <hr>
                @endif
                @if(is_array(Session::get('flash_notification.message')))
                    @foreach(Session::get('flash_notification.message') as $title => $message)
                        @if(is_array($message))
                            <p class="alert-title with-list">{{ $title }}</p>
                            <ul>
                                @foreach($message as $text)
                                    <li>{{ $text }}</li>
                                @endforeach
                            </ul>
                        @else    
                            <p class="alert-message single">{{ $message }}</p>
                        @endif
                    @endforeach
                @else
                    {{ Session::get('flash_notification.message') }}
                @endif
            </div>
        </div>
    </div>
    @endif
@endif