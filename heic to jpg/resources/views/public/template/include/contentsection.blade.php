<div class="px-lg-5 px-3">
    <div class="row gx-4">
        <div class="col-lg-8">
            <div class="table-of-contents mt-4 bg-white p-4">
                <h2>{{ __(dynamicString('table_of_contents',$language->id)) }}</h2>
                <div class="tab-content" id="table-of-contents">
                </div>
            </div>
            <div class="page-content bg-white p-4 mt-5">
                {!! @$page->content !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="bg-white widget-container mt-4 p-3">
                <div class="widget p-3 mb-3">
                    <strong>{{ __(dynamicString('widget_heading',$language->id)) }}</strong>
                    <p>{{ __(dynamicString('widget_description',$language->id)) }}</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn px-4 submit-btn">{{ __(dynamicString('get_code',$language->id)) }}</button>
                    </div>
                </div>
                <div class="feedback p-3 mb-3">
                    <strong>{{ __(dynamicString('feedback_heading',$language->id)) }}</strong>
                    <p>{{ __(dynamicString('feedback_description',$language->id)) }}</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn px-4 submit-btn" data-toggle="modal" data-target="#feedback">{{ __(dynamicString('feedback_heading',$language->id)) }}</button>
                    </div>
                </div>
                <div class="app-container p-3">
                    <strong>{{ __(dynamicString('App_link_heading',$language->id)) }}</strong>
                    <p>{{ __(dynamicString('App_link_description',$language->id)) }}</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ url(settings('playstore_link')) }}"><img class="store-icon" src="{{ asset('public/images/playstoreicon.webp') }}"/></a>
                        <a href="{{ url(settings('app_store_link')) }}"><img class="store-icon" src="{{ asset('public/images/appstoreicon.webp') }}"/></a>
                    </div>
                </div>
            </div>
            <div class="bg-white related-articles mt-5 p-3">
                <h2 class="text-center">{{ __(dynamicString('related_articles',$language->id)) }}</h2>
                <ul>
                    <li>Does this image to text converter free of cost?</li>
                    <li>Does this photo converter heilp in converting tiff to text?</li>
                    <li>How can I convert my handwritten notes into editable text?</li>
                    <li>How can I extract text from JPG?</li>
                    <li>Does this image to text converter free of cost?</li>
                    <li>Does this tool convert all image formats?</li>
                    <li>Does OCR work perfectly for blurred and low resolution pictures?</li>
                    <li>How can I convert my handwritten notes into editable text?</li>
                </ul>
            </div>
        </div>
    </div>
</div>