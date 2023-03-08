<template>
    <div id="app">
        <div v-bind:class="[gameMode, 'game']">
            <div class="game__mode">
                <span>Game mode: </span>
                <button v-on:click="switchGameMode">{{gameMode}}</button>
            </div>
            <table class="game__settings">
                <tr>
                    <td>
                        <label for="ycells">Y Cells</label>
                        <input
                                type="number"
                                v-model="yCells"
                                id="ycells"
                        >
                    </td>
                    <td>
                        <label for="xcells">X Cells</label>
                        <input
                                type="number"
                                v-model="xCells"
                                id="xcells"
                        >
                    </td>
                    <td>
                        <label for="cellsize">Cell size</label>
                        <input
                                type="number"
                                v-model="cellSize"
                                id="cellsize"
                        >
                    </td>
                    <td>
                        <label for="gamespeed">Game speed</label>
                        <input
                                type="number"
                                v-model="gameSpeed"
                                id="gamespeed"
                                step="100"
                        >
                    </td>
                </tr>
            </table>
            <table class="game__stats">
                <tr>
                    <td><span>Turn:</span> <strong> {{gameTurn}}</strong></td>
                    <td><span>Cells alive:</span> {{cellsAlive}}</td>
                    <td><span>Cells died:</span> {{cellsDied}}</td>
                </tr>
            </table>
            <table class="game__box">
                <tbody>
                <tr
                        v-for="(cellY, cellYindex) in tableGrid"
                        v-bind:key="cellYindex">
                    <td
                            v-on:mousedown="switchCellValue"
                            v-for="(cellX, cellXindex) in cellY"
                            v-bind:cellx="cellXindex"
                            v-bind:celly="cellYindex"
                            v-bind:cellvalue="cellX"
                            v-bind:key="cellXindex"
                            v-bind:style="{width: cellSize + 'px', height: cellSize + 'px'}"
                    >
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="game__controls">
                <tr>
                    <td>
                        <button
                                type="button"
                                v-on:click="startGame"
                                v-bind:disabled="gameInterval"
                        >
                            Play
                        </button>
                    </td>
                    <td>
                        <button
                                type="button"
                                v-on:click="pauseGame"
                                v-bind:disabled="!gameInterval"
                        >
                            Pause
                        </button>
                    </td>
                    <td>
                        <button
                                type="button"
                                v-on:click="createTable('random')">
                            Random
                        </button>
                    </td>
                    <td>
                        <button
                                type="button"
                                v-on:click="createTable">
                            Clear
                        </button>
                    </td>
                </tr>
            </table>
            <table class="game__actions">
                <tr>
                    <td>
                        <button
                                type="button"
                                v-on:click="nextTurn(1)">
                            Next turn
                        </button>
                    </td>
                    <td>
                        <button
                                type="button"
                                v-on:click="nextTurn(gameTurnSkip)">
                            Skip by
                        </button>
                        <input
                                type="number"
                                step="10"
                                v-model="gameTurnSkip">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'app',
        data: function () {
            return {
                yCells: 35,
                xCells: 60,
                yCellsConst: Number,
                xCellsConst: Number,
                cellsDied: 0,
                cellsAlive: 0,
                cellSize: 10,
                gameTurn: 0,
                gameTurnSkip: 10,
                gameSpeed: 300,
                gameInterval: null,
                gameMode: 'night'
            }
        },
        computed: {
            ...mapState(['tableGrid'])
        },
        watch: {
            gameSpeed: function () {
                this.pauseGame();
                this.startGame();
            },
            yCells: function () {
                this.pauseGame();
                this.createTable();
            },
            xCells: function () {
                this.pauseGame();
                this.createTable();
            }
        },
        created() {
            this.createTable();
        },
        methods: {
            createTable: function (value) {
                this.clearGameStats();

                const tableGrid = {};
                const yCell = this.yCells;
                const xCell = this.xCells;
                this.yCellsConst = yCell;
                this.xCellsConst = xCell;

                for (let y = 0; y < yCell; y++) {
                    tableGrid[y] = [];
                    for (let x = 0; x < xCell; x++) {
                        tableGrid[y][x] = value === 'random' ? Math.round(Math.random()) : 0;
                    }
                }

                this.$store.dispatch('createTableGrid', tableGrid)
            },
            switchCellValue: function (event) {
                const cellY = event.target.attributes.celly.value;
                const cellX = event.target.attributes.cellx.value;

                this.$store.dispatch('updateTableCell', {cellY, cellX})
            },
            updateTableGrid: function () {
                const tableGrid = this.tableGrid;
                let tableMirrorGrid = [];
                for (let y = 0; y < this.yCellsConst; y++) {
                    tableMirrorGrid[y] = [];
                    for (let x = 0; x < this.xCellsConst; x++) {
                        let neighboursCount = 0;

                        if (y - 1 in tableGrid) {
                            if (x - 1 in tableGrid[y - 1]) {
                                neighboursCount += tableGrid[y - 1][x - 1];
                            }

                            neighboursCount += tableGrid[y - 1][x];

                            if (x + 1 in tableGrid[y - 1]) {
                                neighboursCount += tableGrid[y - 1][x + 1];
                            }
                        }

                        if (x - 1 in tableGrid[y]) {
                            neighboursCount += tableGrid[y][x - 1];
                        }

                        if (x + 1 in tableGrid[y]) {
                            neighboursCount += tableGrid[y][x + 1];
                        }

                        if (y + 1 in tableGrid) {
                            if (x - 1 in tableGrid[y + 1]) {
                                neighboursCount += tableGrid[y + 1][x - 1];
                            }

                            neighboursCount += tableGrid[y + 1][x];

                            if (x + 1 in tableGrid[y + 1]) {
                                neighboursCount += tableGrid[y + 1][x + 1];
                            }
                        }

                        if (tableGrid[y][x] === 1) {
                            switch (neighboursCount) {
                                case 2:
                                    tableMirrorGrid[y][x] = 1;
                                    break;
                                case 3:
                                    tableMirrorGrid[y][x] = 1;
                                    break;
                                default:
                                    tableMirrorGrid[y][x] = 0;
                                    this.cellsDied++;
                            }
                        } else {
                            switch (neighboursCount) {
                                case 3:
                                    tableMirrorGrid[y][x] = 1;
                                    this.cellsAlive++;
                                    break;
                                default:
                                    tableMirrorGrid[y][x] = 0;
                            }
                        }
                    }
                }

                this.$store.dispatch('updateTableGrid', tableMirrorGrid);
                this.gameTurn++;
            },
            nextTurn: function (skip) {
                for (let i = 0; i < skip; i++) {
                    this.updateTableGrid()
                }
            },
            startGame: function () {
                if (!this.gameInterval) {
                    this.gameInterval = setInterval(() => {
                        this.updateTableGrid();
                    }, this.gameSpeed);
                }
            },
            pauseGame: function () {
                clearInterval(this.gameInterval);
                this.gameInterval = null;
            },
            clearGameStats: function () {
                this.pauseGame();
                this.gameTurn = 0;
                this.cellsDied = 0;
                this.cellsAlive = 0;
            },
            switchGameMode: function () {
                this.gameMode = this.gameMode === 'night' ? 'day' : 'night'
            }
        }
    }
</script>

<style lang="scss">
    @import "./styles/game";
</style>
