<div class="card-body">
    <div class="row">



        <div class="col-sm-6 col-md-6">


            <div class="form-group">
                <label for="blog_is_published">{{ __('admin/pages/blog_post_list.published') }}</label>

                <select name='status' class='form-control'
                        aria-describedby='blog_is_published_help'>
                    <option @if(old("status",$post->status) == '1') selected='selected' @endif value='1'>
                        Published
                    </option>
                    <option @if(old("status",$post->status) == '0') selected='selected' @endif value='0'>Not
                        Published
                    </option>
                </select>
                <small id="blog_is_published_help" class="form-text text-muted">{{ __('admin/pages/blog_post_list.published_description') }}</small>
            </div>

        </div>

    </div>

<div class="form-group">
        <label for="blog_post_body">Privacy Policy Body
            @if(config("blogetc.echo_html"))
            (HTML)
            @else
            (Html will be escaped)
            @endif

        </label>
        <textarea style='min-height:600px;' class="form-control" id="blog_post_body"
            aria-describedby="blog_post_body_help" placeholder="Enter Blog Body" name='body'>{{old("body",$post->body)}}</textarea>
         <div class='alert alert-danger'>
            {{ __('admin/pages/blog_post_list.post_body_description') }}
         </div>
    </div>
</div>
















</div>
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
            integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        if( typeof(CKEDITOR) !== "undefined" ) {
            CKEDITOR.replace('body');
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush
