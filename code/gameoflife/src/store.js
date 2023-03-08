import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      tableGrid: []
  },
  mutations: {
      CREATE_TABLE_GRID(state, value) {
          state.tableGrid = value;
      },
      UPDATE_TABLE_GRID(state, value) {
          state.tableGrid = value;
      },
      UPDATE_TABLE_CELL(state, {cellY, cellX}) {
          const cellValue = state.tableGrid[cellY][cellX];
          let newValue = cellValue === 1 ? 0 : 1;

          state.tableGrid[cellY].splice(cellX, 1);
          state.tableGrid[cellY].splice(cellX, 0, newValue);
      }
  },
  actions: {
      createTableGrid(context, value) {
          context.commit('CREATE_TABLE_GRID', value)
      },
      updateTableGrid(context, value) {
          context.commit('UPDATE_TABLE_GRID', value)
      },
      updateTableCell(context, {cellY, cellX}) {
          context.commit('UPDATE_TABLE_CELL', {cellY, cellX})
      }
  }
})
