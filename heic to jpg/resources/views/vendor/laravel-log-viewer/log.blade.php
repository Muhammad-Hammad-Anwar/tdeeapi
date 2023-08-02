@extends('vendor.laravel-log-viewer.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col sidebar mb-3">
            <h1><i class="fa fa-calendar" aria-hidden="true"></i> Error Log Viewer</h1>
            <div class="custom-control custom-switch" style="padding-bottom:20px;">
                <input type="checkbox" class="custom-control-input" id="darkSwitch">
                <label class="custom-control-label" for="darkSwitch" style="margin-top: 6px;">Dark Mode</label>
            </div>
            <div class="list-group div-scroll">
                @foreach($folders as $folder)
                <div class="list-group-item">
                    <?php \Rap2hpoutre\LaravelLogViewer\LaravelLogViewer::DirectoryTreeStructure( $storage_path, $structure ); ?>
                </div>
                @endforeach
                @foreach($files as $file)
                <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
                    class="list-group-item @if ($current_file == $file) llv-active @endif">
                    {{$file}}
                </a>
                @endforeach
            </div>
        </div>
        <div class="col-10 table-container">
            @if ($logs === null)
            <div>
                Log file >50M, please download it.
            </div>
            @else
            <table id="table-log" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
                <thead>
                    <tr>
                        @if ($standardFormat)
                            <th>Level</th>
                            <th>Context</th>
                            <th>Date</th>
                        @else
                            <th>Line number</th>
                        @endif
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $key => $log)
                        <tr data-display="stack{{{$key}}}">
                            @if ($standardFormat)
                                <td class="nowrap text-{{{$log['level_class']}}}">
                                    <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                </td>
                                <td class="text">{{$log['context']}}</td>
                            @endif
                            <td class="date">{{{$log['date']}}}</td>
                            <td class="text">
                                @if ($log['stack'])
                                    <button type="button"
                                        class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                        data-display="stack{{{$key}}}">
                                        <span class="fa fa-search"></span>
                                    </button>
                                @endif
                                {{{$log['text']}}}
                                @if (isset($log['in_file']))
                                    <br/>{{{$log['in_file']}}}
                                @endif
                                @if ($log['stack'])
                                    <div class="stack" id="stack{{{$key}}}"
                                        style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <div class="p-3">
                @if($current_file)
                    <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                        <span class="fa fa-download"></span> Download file
                    </a>
                    -
                    <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                        <span class="fa fa-sync"></span> Clean file
                    </a>
                    -
                    <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                        <span class="fa fa-trash"></span> Delete file
                    </a>
                    @if(count($files) > 1)
                    -
                    <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                        <span class="fa fa-trash-alt"></span> Delete all files
                    </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>      
@endsection