@extends('admin.Layouts')
@section('admin_content')
    <style>
        input {
            border: 1px solid #CED4DA !important;
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mt-3 pl-5">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Our Blogs</h4>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Tag
                                        </th>
                                        <th class="col-md-2">
                                            Description
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Edit
                                        </th>
                                        <th>
                                            Delete
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                {{ $blog->title }}
                                            </td>

                                            <td>
                                                {{ $blog->tag }}
                                            </td>

                                            <td style="white-space: normal;">
                                                {!! $blog->description  !!}
                                            </td>

                                            <td class="py-1">
                                                <img style="width: 100px; height: 100px"
                                                     src="{{ asset('admin/images/upload-blog/'. $blog->image) }}"
                                                     alt="image">
                                            </td>

                                            <td>
                                                <input data-id="{{ $blog->id }}" class="toggle-class-blog"
                                                       type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                       data-toggle="toggle-blog" data-on="Active"
                                                       data-off="Inactive" {{ $blog->status ? 'checked' : '' }}>
                                            </td>

                                            <td class="" style="vertical-align: middle !important;">
                                                <a href="{{ url('blog-edit/' . $blog->id) }}"
                                                   class="btn mt-1"
                                                   style="padding: 10px 13px; background: #16a085; color: white">
                                                    Edit Blog

                                                </a>
                                            </td>
                                            <td class="" style="vertical-align: middle !important;">
                                                <form action="{{ url('blog-delete/' . $blog->id) }}"
                                                      method="POST" class="mt-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"
                                                            style="padding: 10px 13px; background: red; color: white">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
