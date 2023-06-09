<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="utilities mt-24 justify-content-end">
                <div class="language mr-8">
                    <a href="javascript:void(0)">
                        {{strtoupper(config('app.locale'))}}
                        <i class="size16">
                            <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.78906 4.65625C3.90625 4.77344 4.07031 4.77344 4.1875 4.65625L7.65625 1.21094C7.77344 1.11719 7.77344 0.929688 7.65625 0.8125L7.1875 0.367188C7.09375 0.25 6.90625 0.25 6.78906 0.367188L4 3.13281L1.1875 0.367188C1.07031 0.25 0.90625 0.25 0.789062 0.367188L0.320312 0.8125C0.203125 0.929688 0.203125 1.11719 0.320312 1.21094L3.78906 4.65625Z"
                                    fill="#101825"/>
                            </svg>
                        </i></a>
                    <div class="switch-languages">
                        @foreach(config('app.menu_locales') as $code => $locale)
                            @if($code !== config('app.locale'))
                                <a href="{{ \Str::replaceFirst(env('APP_DOMAIN', '') . '/' . config('app.locale'), env('APP_DOMAIN', '') . '/' . $code, Request::url()) }}">{{ strtoupper($code) }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <button class="usability btn40 mr-8">
                    <i class="size20">
                        <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.4375 5.92969L14.5625 2.45703C14.3984 1.71875 13.6602 0.625 12.2383 0.625C11.8008 0.625 11.6094 0.707031 11.0625 0.898438C10.8164 0.980469 10.707 1.22656 10.7891 1.44531L10.9258 1.88281C10.9805 2.04688 11.1445 2.15625 11.3359 2.15625C11.418 2.15625 11.4727 2.15625 11.8281 2.01953C12.5391 1.80078 13.1406 2.18359 13.3047 2.78516L14.0977 6.01172C13.5234 5.65625 12.8672 5.4375 12.1562 5.4375C10.625 5.4375 9.33984 6.33984 8.76562 7.625H7.20703C6.63281 6.33984 5.34766 5.4375 3.84375 5.4375C3.10547 5.4375 2.44922 5.65625 1.875 6.01172L2.66797 2.78516C2.83203 2.18359 3.43359 1.80078 4.14453 2.01953C4.5 2.15625 4.55469 2.15625 4.63672 2.15625C4.82812 2.15625 4.99219 2.04688 5.04688 1.88281L5.18359 1.44531C5.26562 1.22656 5.15625 0.980469 4.91016 0.898438C4.36328 0.707031 4.17188 0.625 3.73438 0.625C2.33984 0.625 1.57422 1.71875 1.41016 2.45703L0.535156 5.92969C0.179688 7.40625 0.125 7.98047 0.125 9.15625C0.125 11.2344 1.76562 12.875 3.84375 12.875C5.8125 12.875 7.39844 11.3438 7.53516 9.375H8.4375C8.57422 11.3438 10.1602 12.875 12.1289 12.875C14.207 12.875 15.8477 11.2344 15.8477 9.15625C15.875 7.98047 15.793 7.40625 15.4375 5.92969ZM3.84375 11.5625C2.50391 11.5625 1.4375 10.4961 1.4375 9.15625C1.4375 7.84375 2.50391 6.75 3.84375 6.75C5.15625 6.75 6.25 7.84375 6.25 9.15625C6.25 10.4961 5.15625 11.5625 3.84375 11.5625ZM12.1562 11.5625C10.8164 11.5625 9.75 10.4961 9.75 9.15625C9.75 7.84375 10.8164 6.75 12.1562 6.75C13.4688 6.75 14.5625 7.84375 14.5625 9.15625C14.5625 10.4961 13.4688 11.5625 12.1562 11.5625Z"
                                fill="#101825"/>
                        </svg>
                    </i>
                </button>
                <button class="search-mobile btn40 mr-8">
                    <i class="size20">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.8906 13.5742L10.582 10.2656C10.5 10.2109 10.418 10.1562 10.3359 10.1562H9.98047C10.8281 9.17188 11.375 7.85938 11.375 6.4375C11.375 3.32031 8.80469 0.75 5.6875 0.75C2.54297 0.75 0 3.32031 0 6.4375C0 9.58203 2.54297 12.125 5.6875 12.125C7.10938 12.125 8.39453 11.6055 9.40625 10.7578V11.1133C9.40625 11.1953 9.43359 11.2773 9.48828 11.3594L12.7969 14.668C12.9336 14.8047 13.1523 14.8047 13.2617 14.668L13.8906 14.0391C14.0273 13.9297 14.0273 13.7109 13.8906 13.5742ZM5.6875 10.8125C3.25391 10.8125 1.3125 8.87109 1.3125 6.4375C1.3125 4.03125 3.25391 2.0625 5.6875 2.0625C8.09375 2.0625 10.0625 4.03125 10.0625 6.4375C10.0625 8.87109 8.09375 10.8125 5.6875 10.8125Z"
                                fill="#101825"/>
                        </svg>
                    </i>
                </button>
                <div class="search-bar-mobile">
                    <form action="{{route('search')}}">
                        <div><i class="size20">
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.8906 13.5742L10.582 10.2656C10.5 10.2109 10.418 10.1562 10.3359 10.1562H9.98047C10.8281 9.17188 11.375 7.85938 11.375 6.4375C11.375 3.32031 8.80469 0.75 5.6875 0.75C2.54297 0.75 0 3.32031 0 6.4375C0 9.58203 2.54297 12.125 5.6875 12.125C7.10938 12.125 8.39453 11.6055 9.40625 10.7578V11.1133C9.40625 11.1953 9.43359 11.2773 9.48828 11.3594L12.7969 14.668C12.9336 14.8047 13.1523 14.8047 13.2617 14.668L13.8906 14.0391C14.0273 13.9297 14.0273 13.7109 13.8906 13.5742ZM5.6875 10.8125C3.25391 10.8125 1.3125 8.87109 1.3125 6.4375C1.3125 4.03125 3.25391 2.0625 5.6875 2.0625C8.09375 2.0625 10.0625 4.03125 10.0625 6.4375C10.0625 8.87109 8.09375 10.8125 5.6875 10.8125Z"
                                        fill="#8A94A6"/>
                                </svg>
                            </i>
                            <input type="text" name="q" placeholder="Search...">
                        </div>
                        <span class="close-search-bar btn40 ml-8">
                  <i class="size20"><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M6.28516 4.75L9.23828 1.82422C9.40234 1.66016 9.40234 1.35938 9.23828 1.19531L8.55469 0.511719C8.39062 0.347656 8.08984 0.347656 7.92578 0.511719L5 3.46484L2.04688 0.511719C1.88281 0.347656 1.58203 0.347656 1.41797 0.511719L0.734375 1.19531C0.570312 1.35938 0.570312 1.66016 0.734375 1.82422L3.6875 4.75L0.734375 7.70312C0.570312 7.86719 0.570312 8.16797 0.734375 8.33203L1.41797 9.01562C1.58203 9.17969 1.88281 9.17969 2.04688 9.01562L5 6.0625L7.92578 9.01562C8.08984 9.17969 8.39062 9.17969 8.55469 9.01562L9.23828 8.33203C9.40234 8.16797 9.40234 7.86719 9.23828 7.70312L6.28516 4.75Z"
                      fill="#050F21"/>
                  </svg></i></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
