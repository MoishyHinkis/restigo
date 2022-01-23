

function DataTable({ columns, children, items }) {


    return <div>
    {/* {cols} */}
        <table className="border-collapse border border-slate-400" >
            <thead>
                <tr >
                    {columns.map((column) => {
                        return <th className="text-center p-2" key={column} >
                            {column}
                        </th>
                    })}
                </tr>
            </thead>
            <tbody>
                {
                    items?.map((item) => {
                        return <tr key={item.id} >
                            {
                                columns.map((column) => {
                                    return <td className="border border-slate-400 p-2 text-center" 
                                    key={column} >
                                        {children(item,column)}
                                    </td>
                                })
                            }
                        </tr>
                    })
                }
            </tbody>
        </table>
    </div>
}

export default DataTable