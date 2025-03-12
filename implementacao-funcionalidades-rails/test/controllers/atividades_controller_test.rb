require "test_helper"

class AtividadesControllerTest < ActionDispatch::IntegrationTest
  test "should get index" do
    get atividades_index_url
    assert_response :success
  end
end
