<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Set Plays</div>

                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            const margin = { top: 50, right: 50, bottom: 50, left: 50};
            const height = 500;
            const width = 500;
            return {
                frames : [
                    {
                        number : 1,
                        objects : [
                            { x: 1, y: 2, team: 'blue'},
                            { x: 10, y: 2, team: 'red'}
                        ]

                    },
                    {
                        number : 1,
                        objects : [
                            { x: 100, y: 20, team: 'blue'},
                            { x: 100, y: 20, team: 'red'}
                        ]

                    },
                    {
                        number : 1,
                        objects : [
                            { x: 1, y: 20, team: 'blue'},
                            { x: 1, y: 20, team: 'red'}
                        ]

                    },
                ],
                svg : null,
                margin : margin,
                height : height,
                width : width,
            }
        },
        mounted() {
            this.svg = d3.select('.card-body')
                .append('svg')
                .attr('height', this.height + this.margin.top + this.margin.bottom)
                .attr('width', this.width + this.margin.left + this.margin.right);
                for( let i = 0; i < this.frames.length; i++) {
                    setTimeout(() => {
                        console.log(this.frames[i]);
                        this.update(this.frames[i]);
                    }, 2000);
                }
        },
        methods: {
            update(data) {
                const cscale = d3.scaleOrdinal(d3.schemeCategory10).domain(['blue', 'red']);
                const xscale = d3.scaleBand().domain(d3.extent(data.objects, (d) => d.x)).range([this.margin.left, this.margin.left + this.width]);
                const yscale = d3.scaleBand().domain(d3.extent(data.objects, (d) => d.y)).range([this.margin.top, this.margin.top + this.width]);

                const circles = this.svg.selectAll('circle')
                    .data(data.objects, (d) => d)
                    .join(
                        (enter) => enter.append('circle')
                            .attr('r', 10)
                            .attr('cx', (d) => xscale(d.x))
                            .attr('cy', (d) => yscale(d.y))
                            .style('fill', (d) => cscale(d.team)),
                        (update) => update
                            .attr('r', 10)
                            .attr('cx', (d) => xscale(d.x))
                            .attr('cy', (d) => yscale(d.y))
                            .style('fill', (d) => cscale(d.team)),
                        (exit) => exit.remove(),
                    );

                // a will be bound to the first DOM element
                circles.transition()
                    .attr('cy', (d, i) => 10 + i * 20);
            }
        }
        
    }
</script>
