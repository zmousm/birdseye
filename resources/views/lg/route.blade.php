
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">
    Route Details - <code>{{$net}}</code>
        @if ( $source == 'table' )
            in table <code>{{$name}}</code>
        @else
            as received from protocol <code>{{$name}}</code>
        @endif
</h4>
</div>
<div class="modal-body">
    @foreach ( $content->routes as $r )

    <table class="table">
        <tbody>
            <tr>
                <td><strong>Network</strong></td>
                <td>{{$r->network}}</td>
            </tr>
            <tr>
                <td><strong>Gateway</strong></td>
                <td>
                    {{$r->gateway}}
                    &nbsp;&nbsp;
                    @if ( $r->primary )
                        <span class="label label-success">PRIMARY</span>
                    @else
                        <span class="label label-warning">NOT PRIMARY</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>Interface</strong></td>
                <td>{{$r->interface}}</td>
            </tr>
            <tr>
                <td><strong>From Protocol</strong></td>
                <td>{{$r->from_protocol}}</td>
            </tr>
            <tr>
                <td><strong>Age</strong></td>
                <td>{{ strtotime( $r->age ) ? date( "Y-m-d H:i:s", strtotime( $r->age ) ) : '' }}</td>
            </tr>
            <tr>
                <td><strong>Metric</strong></td>
                <td>{{$r->metric}}</td>
            </tr>
            <tr>
                <td><strong>Type</strong></td>
                <td>{{ implode( ' ', $r->type )}}</td>
            </tr>
            @if (isset( $r->bgp->origin ))
                <tr>
                    <td><strong>BGP :: Origin</strong></td>
                    <td>{{$r->bgp->origin}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->as_path ))
                <tr>
                    <td><strong>BGP :: AS Path</strong></td>
                    <td>{{implode( ' ', $r->bgp->as_path )}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->nect_hop ))
                <tr>
                    <td><strong>BGP :: Next Hop</strong></td>
                    <td>{{$r->bgp->next_hop}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->med ))
                <tr>
                    <td><strong>BGP :: MED</strong></td>
                    <td>{{$r->bgp->med}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->local_pref ))
                <tr>
                    <td><strong>BGP :: Local Pref</strong></td>
                    <td>{{$r->bgp->local_pref}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->atomic_aggr ))
                <tr>
                    <td><strong>BGP :: Atomic Aggr</strong></td>
                    <td>{{$r->bgp->atomic_aggr}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->aggregator ))
                <tr>
                    <td><strong>BGP :: Aggregator</strong></td>
                    <td>{{$r->bgp->aggregator}}</td>
                </tr>
            @endif
            @if (isset( $r->bgp->communities ))
                <tr>
                    <td><strong>BGP :: Communities</strong></td>
                    <td>
                        @foreach( $r->bgp->communities as $c )
                            ({{implode(', ',$c)}})
                        @endforeach
                    </td>
                </tr>
            @endif
            @if (isset( $r->bgp->ext_communities ))
                <tr>
                    <td><strong>BGP :: Extended Communities</strong></td>
                    <td>
                        @foreach( $r->bgp->ext_communities as $c )
                            ({{implode(', ',$c)}})
                        @endforeach
                    </td>
                </tr>
            @endif
            @if (isset( $r->bgp->large_communities ))
                <tr>
                    <td><strong>BGP :: Large Communities</strong></td>
                    <td>
                        @foreach( $r->bgp->large_communities as $c )
                            ({{implode(', ',$c)}})
                        @endforeach
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <br><br>
    @endforeach
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
