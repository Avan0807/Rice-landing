<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the main landing page
     *
     * @return View
     */
    public function index(): View
    {
        // Dữ liệu sản phẩm (sau này sẽ lấy từ database)
        $product = [
            'name' => 'Bột Gạo Lứt Tùng Beo',
            'price' => 150000,
            'weight' => '500g (20 gói x 25g)',
            'brand' => 'Tùng Beo',
            'origin' => 'Việt Nam',
            'description' => 'Sản phẩm được làm từ 100% gạo lứt tự nhiên cùng các nguyên liệu bổ dưỡng như đậu gà, đậu hà lan, điểm mạch, yến mạch, hạt sen, ó chó, hạnh nhân và macca.',
            'features' => [
                'Hương vị tự nhiên',
                'Không chất bảo quản',
                'Nguồn gốc thiên nhiên'
            ]
        ];

        // Thành phần sản phẩm
        $ingredients = [
            [
                'name' => 'Gạo lứt',
                'description' => 'Nguồn chính, giàu chất xơ và vitamin B',
                'icon' => '🌾'
            ],
            [
                'name' => 'Đậu gà',
                'description' => 'Protein thực vật chất lượng cao',
                'icon' => '🥜'
            ],
            [
                'name' => 'Đậu hà lan',
                'description' => 'Vitamin A, C và khoáng chất',
                'icon' => '🟢'
            ],
            [
                'name' => 'Điểm mạch',
                'description' => 'Chất xơ và protein hoàn chỉnh',
                'icon' => '🌱'
            ],
            [
                'name' => 'Yến mạch',
                'description' => 'Beta-glucan giảm cholesterol',
                'icon' => '🥣'
            ],
            [
                'name' => 'Hạt sen',
                'description' => 'Khoáng chất và vitamin E',
                'icon' => '🪷'
            ],
            [
                'name' => 'Ó chó',
                'description' => 'Omega-3 và chất béo tốt',
                'icon' => '🌰'
            ],
            [
                'name' => 'Hạnh nhân',
                'description' => 'Vitamin E và magie',
                'icon' => '🌰'
            ],
            [
                'name' => 'Macca',
                'description' => 'Chất béo không bão hòa',
                'icon' => '🥥'
            ]
        ];

        // Lợi ích sức khỏe
        $benefits = [
            [
                'title' => 'Đẹp da - Đẹp tóc',
                'description' => 'Vitamin E và các chất chống oxi hóa giúp da khỏe mạnh, tóc bóng mượt từ bên trong'
            ],
            [
                'title' => 'Hỗ trợ hệ tiêu hóa',
                'description' => 'Chất xơ tự nhiên giúp cải thiện tiêu hóa, ngăn ngừa táo bón hiệu quả'
            ],
            [
                'title' => 'Cải thiện cảm giác đói',
                'description' => 'Protein và chất xơ tạo cảm giác no lâu, hỗ trợ kiểm soát cân nặng'
            ],
            [
                'title' => 'Giúp lợi sữa sau sinh',
                'description' => 'Các dưỡng chất tự nhiên hỗ trợ mẹ sau sinh trong việc tăng tiết sữa'
            ],
            [
                'title' => 'Cải thiện đường trong máu',
                'description' => 'Chỉ số GI thấp giúp ổn định đường huyết, phù hợp cho người tiểu đường'
            ],
            [
                'title' => 'Bổ sung năng lượng',
                'description' => 'Carbohydrate phức hợp cung cấp năng lượng bền vững cho cả ngày dài'
            ]
        ];

        // Combo khuyến mãi
        $combos = [
            [
                'title' => 'Mua 3 Tặng 3',
                'description' => 'Bình lắc + Thước dây',
                'image' => 'combo-3-tang-3.jpg'
            ],
            [
                'title' => 'Mua 2 Tặng 2',
                'description' => 'Bình lắc + Thước dây',
                'image' => 'combo-2-tang-2.jpg'
            ],
            [
                'title' => 'Mua 1 Tặng 1',
                'description' => 'Bình lắc protein',
                'image' => 'combo-1-tang-1.jpg'
            ]
        ];

        // Câu chuyện thương hiệu
        $stories = [
            [
                'title' => '🌾 Khởi nguồn từ tình yêu thiên nhiên',
                'content' => 'Tùng Beo ra đời từ niềm đam mê với sức khỏe tự nhiên và mong muốn mang đến cho mọi người những sản phẩm dinh dưỡng chất lượng cao. Chúng tôi tin rằng thiên nhiên đã ban tặng cho con người những món quà quý báu nhất.'
            ],
            [
                'title' => '🏭 Quy trình sản xuất hiện đại',
                'content' => 'Với công nghệ sản xuất tiên tiến, Tùng Beo luôn đảm bảo chất lượng sản phẩm từ khâu tuyển chọn nguyên liệu đến sản phẩm hoàn thiện. Mỗi hạt gạo lứt đều được chọn lọc kỹ càng để đảm bảo giá trị dinh dưỡng tối ưu.'
            ],
            [
                'title' => '❤️ Cam kết chất lượng',
                'content' => 'Tùng Beo cam kết mang đến sản phẩm không chỉ ngon miệng mà còn an toàn cho sức khỏe. Không hương liệu, không đau nành, không chất bảo quản - đây là triết lý "3 KHÔNG" mà chúng tôi luôn tuân thủ.'
            ],
            [
                'title' => '🌟 Sứ mệnh lan tỏa',
                'content' => 'Từ những gia đình nhỏ đến cộng đồng lớn, Tùng Beo mong muốn trở thành người bạn đồng hành tin cậy trong hành trình chăm sóc sức khỏe của mọi người. Mỗi sản phẩm là một lời chúc sức khỏe chân thành.'
            ]
        ];

        // Hướng dẫn sử dụng
        $usageSteps = [
            [
                'step' => 1,
                'title' => 'Chuẩn bị',
                'content' => 'Pha 1 gói bột (25g) với 200ml nước ấm, nước nóng, nước lọc hoặc sữa tươi không đường'
            ],
            [
                'step' => 2,
                'title' => 'Khuấy đều',
                'content' => 'Khuấy đều cho đến khi bột tan hoàn toàn. Có thể sử dụng bình lắc để đạt độ mịn tối ưu'
            ],
            [
                'step' => 3,
                'title' => 'Thời điểm dùng',
                'content' => 'Dùng 2 lần/ngày vào sáng và tối. Có thể thay thế bữa sáng và tối'
            ],
            [
                'step' => 4,
                'title' => 'Lưu ý quan trọng',
                'content' => 'Sau 20h không nên ăn uống bất cứ gì kể cả ăn bột. Không ăn vặt. Không sử dụng khi hết hạn sử dụng'
            ]
        ];

        // Cam kết 3 KHÔNG
        $commitments = [
            [
                'title' => 'KHÔNG HƯƠNG LIỆU',
                'description' => '100% hương vị tự nhiên'
            ],
            [
                'title' => 'KHÔNG ĐẬU NÀNH',
                'description' => 'An toàn cho người dị ứng'
            ],
            [
                'title' => 'KHÔNG CHẤT BẢO QUẢN',
                'description' => 'Tươi ngon, an toàn tuyệt đối'
            ]
        ];

        // Thông tin liên hệ
        $contact = [
            'hotline' => '0123.456.789',
            'zalo' => '0123.456.789',
            'email' => 'tungbeo@gmail.com'
        ];

        return view('pages.home', compact(
            'product',
            'ingredients', 
            'benefits',
            'combos',
            'stories',
            'usageSteps',
            'commitments',
            'contact'
        ));
    }

    /**
     * Handle contact form submission
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000'
        ]);

        // Lưu thông tin liên hệ (sẽ implement sau)
        // Contact::create($request->all());

        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.');
    }
}