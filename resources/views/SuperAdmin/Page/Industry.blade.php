@extends('SuperAdmin.index')
@section('content')
    <div class="container">
        <h1 class="text-center">Industry</h1>
        <div class="table-responsive">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#modalId">
                Add Industries
            </button>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Descrirption</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C2</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="addIndustries">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Add Industries
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div
                            class="table-responsive"
                        >
                        <button type="button" class="btn btn-primary mt-2 mb-2" id="addMoreIndustry">Add More</button>
                            <table
                                class="table table-bordered table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="fetchInputData">
                                    <tr class="">
                                        <td scope="row">
                                            @csrf
                                                <input
                                                    type="text"
                                                    name="industry_names[]"
                                                    id=""
                                                    class="form-control"
                                                    placeholder=""
                                                    aria-describedby="helpId"
                                                />
                                        </td>
                                        <td>
                                            <input
                                            type="text"
                                            name="description[]"
                                            id=""
                                            class="form-control"
                                            placeholder=""
                                            aria-describedby="helpId"
                                        />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            // Industry Input fied add
            $("#addMoreIndustry").on("click",function(){
                $("#fetchInputData").append(`
                    <tr class="">
                     <td scope="row">
                        <input type="text" name="industry_names[]"  id=""  class="form-control" placeholder="" />
                        </td>
                        <td>
                            <input  type="text"  name="description[]"  id=""  class="form-control"  placeholder="" />
                         </td>
                            <td>
                                <button type="button" class="btn btn-danger btnRemove">Remove</button>
                            </td>
                    </tr>
                `);
            })

            $(document).on("click",".btnRemove",function(){
                $(this).closest("tr").remove();
            })
            // Industry Input fied add

            $("#addIndustries").submit(function(event){
                event.preventDefault();
                $("#btnSave").text("Saving...");
                $("#btnSave").prop("disabled",true);
                let formdata=new FormData(this);
                $.ajax({
                    method:"POST",
                    url:"/admin/industry/store",
                    data:formdata,
                    contentType:false,
                    processData:false,
                    success:function(response){
                        console.log(response);
                    }
                })
            })
        })
    </script>
    {{-- Add Modal --}}
@endsection
